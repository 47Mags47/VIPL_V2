<?php

namespace App\Http\Controllers\web\package;

use App\Http\Controllers\Controller;
use App\Jobs\ParsePackageFile;
use App\Models\Glossary\Bank;
use App\Models\Main\Package;
use App\Models\Main\PackageFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

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
            'upload_user_id' => Auth::user()->id,
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
