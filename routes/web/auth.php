<?php

use App\Http\Controllers\web\Auth\AuthenticateController;
use App\Http\Controllers\web\AuthController;
use Illuminate\Support\Facades\Route;

Route::controller(AuthenticateController::class)->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('/login', 'create')->name('login');
        Route::post('/login', 'store');
    });
    Route::middleware('auth')->group(function () {
        Route::get('/logout', 'destroy')->name('logout');
    });
});
