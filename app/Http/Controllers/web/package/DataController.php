<?php

namespace App\Http\Controllers\web\package;

use App\Http\Controllers\Controller;
use App\Models\Main\PackageFile;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function index(PackageFile $file){
        $data = $file->data()->search()->sort()->paginate(100);
        return view('pages.payment.data.index', compact('data', 'file'));
    }
}
