<?php

namespace App\Http\Controllers\web\package;

use App\Http\Controllers\Controller;
use App\Models\Main\PackageFile;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function index(Request $request, PackageFile $file){
        $data = $file->data;
        return view('pages.payment.data.index', compact('data'));
    }
}