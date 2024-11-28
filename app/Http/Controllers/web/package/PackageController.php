<?php

namespace App\Http\Controllers\web\package;

use App\Http\Controllers\Controller;
use App\Models\Main\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function index(){
        $packages = Package::all();

        return view('pages.payment.package.index', compact('packages'));
    }
}
