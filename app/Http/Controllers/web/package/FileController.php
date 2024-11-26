<?php

namespace App\Http\Controllers\web\package;

use App\Http\Controllers\Controller;
use App\Models\Main\Package;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public function index(Request $request, Package $package){
        $files = $package->files;
        return view('pages.payment.file.index', compact('files'));
    }
}
