<?php

use App\Http\Controllers\web\package\FileController;
use App\Http\Controllers\web\package\PackageController;
use Illuminate\Support\Facades\Route;

Route::prefix('/payment')->group(function () {
    Route::prefix('/package')->controller(PackageController::class)->group(function () {
        Route::get('/index', 'index')->name('payment.package.index');
    });
    Route::prefix('/package/{package}/file')->controller(FileController::class)->group(function () {
        Route::get('/index', 'index')->name('payment.file.index');
    });
});
