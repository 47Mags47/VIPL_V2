<?php

namespace App\Http\Controllers\web\package;

use App\Http\Controllers\Controller;
use App\Jobs\ParsePackageFile;
use App\Models\Glossary\Bank;
use App\Models\Main\Package;
use App\Models\Main\PackageFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function index(Request $request, Package $package)
    {
        session()->put('package', $package);

        $files = $package->files()->search($request->search)->sort($request)->paginate(100);
        $create_dialog = $this->create();

        return view('pages.payment.file.index', [
            'files' => $files,
            'create_dialog' => $create_dialog,
            'package' => $package,
            'search' => $request->search ?? ''
        ]);
    }

    public function create()
    {
        $banks = Bank::orderBy('code')->get();
        return view('pages.payment.file.create', compact('banks'));
    }

    public function store(Request $request, Package $package)
    {
        $request->validate([
            'bank_code' => ['required', 'string', 'not_in:0'],
            'file' => ['required', 'file', 'mimes:txt,csv', 'max:2048'],
        ]);

        $file = PackageFile::create([
            'path' => 'tmp',
            'status_code' => 'upload',
            'bank_code' => $request->bank_code,
            'package_id' => $package->id,
        ]);

        $payment_code = 'payment_code';

        try {
            $dir = "$payment_code/$package->division_code/$request->bank_code";
            $path = $request->file('file')->storeAs($dir, $file->created_at->format('Y-m-d_H-i-s') . '.csv', 'package_files');

            $file->setStatus('uploaded');
            $file->update(['path' => $path]);
        } catch (\Throwable $th) {
            $file->setStatus('upload_fail');
            Log::error($th);
        }

        ParsePackageFile::dispatch($file);

        return redirect()->route('payment.file.index', compact('package'));
    }
}
