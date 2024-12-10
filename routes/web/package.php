<?php

use App\Http\Controllers\web\package\DataController;
use App\Http\Controllers\web\package\FileController;
use App\Http\Controllers\web\package\PackageController;
use Illuminate\Support\Facades\Route;

Route::prefix('/payment')->middleware('auth')->group(function () {
    Route::prefix('{event}/package')->controller(PackageController::class)->group(function () {
        Route::get('/index', 'index')->middleware('administration')->name('payment.package.index');
    });
    Route::prefix('/package/{package}/file')->controller(FileController::class)->group(function () {
        Route::get('/index', 'index')->name('payment.file.index');
        Route::post('/store', 'store')->name('payment.file.store');
    });
    Route::prefix('/file/{file}/data')->controller(DataController::class)->group(function () {
        Route::get('/index', 'index')->name('payment.data.index');
    });
});
