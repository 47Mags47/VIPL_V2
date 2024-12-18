<?php

namespace App\Http\Controllers\web\package;

use App\Core\Reader\CSVReader;
use App\Http\Controllers\Controller;
use App\Jobs\ParsePackageFile;
use App\Models\Glossary\Bank;
use App\Models\Glossary\PackageDataColumn;
use App\Models\Main\Package;
use App\Models\Main\PackageFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function index(Package $package)
    {
        $files = $package->files()->search()->sort()->paginate(100);
        return view('pages.payment.file.index', compact('files'));
    }

    public function create()
    {
        $banks = Bank::orderBy('code')->get();
        return view('pages.payment.file.create', compact('banks'));
    }

    public function tmp(Request $request, Package $package)
    {
        $request->validate([
            'bank_code' => ['required', 'string', 'not_in:0'],
            'file' => ['required', 'file', 'mimes:txt,csv', 'max:2048'],
        ]);

        $path = Storage::disk('tmp')->putFile("", $request->file('file'));
        $file = PackageFile::create([
            'status_code' => 'upload',
            'bank_code' => $request->bank_code,
            'upload_user_id' => Auth::user()->id,
            'package_id' => $package->id,
            'path' => $path,
        ]);

        return redirect()->route('payment.file.preview', compact('package', 'file'));
    }

    public function preview(Request $request, Package $package, PackageFile $file)
    {
        $columns = PackageDataColumn::orderBy('id')->get();
        $reader = new CSVReader(Storage::disk('tmp')->path($file->path));

        return view('pages.payment.file.preview', compact('package', 'columns', 'reader'));
    }

    public function store(Request $request, Package $package, PackageFile $file)
    {
        $validated = $request->validate([
            'column.*' => ['distinct', 'not_regex:/0/'],
        ]);

        try {
            $date = $package->event->date->format('Y-m-d');
            $payment_code = $package->event->rule !== null ? $package->event->rule->payment->code : 'custom_' . $package->event->id;
            $division_code = $package->division_code;
            $bank_code = $request->bank_code;

            $dir = "$date/$payment_code/$division_code/$bank_code";
            $path = $dir . '/' . $file->id . '.csv';

            Storage::disk('package_files')->writeStream($path, Storage::disk('tmp')->readStream($file->path));
            Storage::disk('tmp')->delete($file->path);

            $file->update([
                'path' => $path,
                'status_code' => 'uploaded'
            ]);

            ParsePackageFile::dispatch($file, $validated['column']);

            return redirect()->route('payment.file.index', compact('package'))->with('sys_message', 'Файл передан на сервер. Начато считывание');
        } catch (\Throwable $th) {
            Log::error($th);
            return redirect()->route('payment.file.index', compact('package'))->with('sys_error', 'ошибка при передаче файла');
        }
    }

    public function show(Request $request, PackageFile $file)
    {
        return $request->user()->can('package-file-view', $file)
            ? redirect()->route('payment.data.index', compact('file'))
            : back()->with('sys_error', 'Доступ заблокирован');
    }
}
