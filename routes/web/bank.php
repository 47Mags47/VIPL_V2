<?php

use App\Http\Controllers\web\BankController;
use Illuminate\Support\Facades\Route;

Route::prefix('/bank')->controller(BankController::class)->group(function () {
    Route::get('/index', 'index')->name('bank.index');
});
