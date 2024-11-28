<?php

namespace App\Http\Controllers\web\package;

use App\Http\Controllers\Controller;
use App\Models\Glossary\Bank;
use App\Models\Main\Package;
use App\Models\Main\PackageFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class FileController extends Controller
{
    public function index(Request $request, Package $package){
        session()->put('package', $package);

        $files = $package->files;
        $create_dialog = $this->create();
        return view('pages.payment.file.index', compact('files', 'create_dialog'));
    }

    public function create(){
        $banks = Bank::orderBy('code')->get();
        return view('pages.payment.file.create', compact('banks'));
    }

    public function store(Request $request, Package $package){
        $request -> validate([
            'bank_code' => ['required' ,'string'],
            'file' => ['required', 'file', 'mimes:txt,csv', 'max:2048'],
        ]);

        $file = PackageFile::create([
            'path' => 'tmp',
            'status_code' => 'upload',
            'bank_code' => $request->bank_code,
            'package_id' => $package->id,
        ]);

        try {
            $request->file('file')->store('', 'tmp');
            $file->setStatus('uploaded');
        } catch (\Throwable $th) {
            $file->setStatus('upload_fail');
            Log::error($th);
        }

        return redirect()->route('payment.file.index', compact('package'));

    }
}
