<?php

namespace App\Http\Controllers\api\Auth;

use App\Http\Controllers\Controller;
use App\Models\Main\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticateController extends Controller
{
    public function login(Request $request)
    {
        if (
            $request->email !== null and $request->password !== null
            and $user = User::where('email', $request->email)->get()->first()
        ) {

            return ['token' => $user->createToken('auth')->plainTextToken];
        } else {
            return [
                'status' => 'fail',
                'error' => 'invalid input'
            ];
        }
    }

    public function createToken(Request $request)
    {
        $token = $request->user()->createToken($request->token_name);
        return ['token' => $token->plainTextToken];
    }

    public function user(Request $request)
    {
        return ['status' => 'ok', 'token' => $request->user()->email];
    }
}
