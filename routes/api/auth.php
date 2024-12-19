<?php

use App\Http\Controllers\api\Auth\AuthenticateController;
use Illuminate\Support\Facades\Route;

Route::controller(AuthenticateController::class)->group(function () {
    Route::post('/tokens/create', 'createToken');
    Route::post('/user', 'user')->middleware('auth:sanctum');
    Route::post('/login', 'login');
});
