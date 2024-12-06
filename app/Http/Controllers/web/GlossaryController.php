<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GlossaryController extends Controller
{
    public function index(){
        return view('pages.glossary.index');
    }
}
