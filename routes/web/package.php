<?php

use App\Http\Controllers\web\Package\PackageController;
use Illuminate\Support\Facades\Route;

Route::prefix('/payment')->group(function () {
    Route::prefix('/package')->controller(PackageController::class)->group(function () {
        Route::get('/index', 'index')->name('payment.package.index');
    });
});
