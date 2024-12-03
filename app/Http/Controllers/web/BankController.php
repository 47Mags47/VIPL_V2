<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Glossary\Bank;
use Illuminate\Http\Request;

class BankController extends Controller
{
    public function index(){
        $banks = Bank::orderBy('code')->get();
        return view('pages.bank.index', compact('banks'));
    }
}
