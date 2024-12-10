<?php

namespace App\Http\Controllers\web\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticateController extends Controller
{
    public function create(){
        return view('pages.auth.login');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'email' => ['required', 'string'],
            'password' => ['required', 'string']
        ]);

        if(Auth::attempt($validated)){
            $request->session()->regenerate();
            return redirect()->route('calendar.index');
        }

        return back()->withErrors('Логин или пароль введены не верно')->onlyInput('email');
    }

    public function destroy(Request $request){
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
