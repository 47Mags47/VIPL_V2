<?php

use App\Http\Controllers\web\package\DataController;
use App\Http\Controllers\web\package\FileController;
use App\Http\Controllers\web\package\PackageController;
use Illuminate\Support\Facades\Route;

Route::prefix('/payment')->middleware('auth')->group(function () {
    ### PACKAGE
    Route::controller(PackageController::class)->group(function () {
        Route::prefix('/{event}/package')->middleware('administration')->group(function () {
            Route::get('/index', 'index')->name('payment.package.index');
        });
        Route::prefix('/package/{package}')->group(function () {
            Route::get('/show', 'show')->name('payment.package.show');
        });
    });

    ### FILE
    Route::controller(FileController::class)->group(function () {
        Route::prefix('/{package}/file')->group(function () {
            Route::get('/index', 'index')->name('payment.file.index');
            Route::get('/create', 'create')->name('payment.file.create');
            Route::post('/store', 'store')->name('payment.file.store');
        });
        Route::prefix('/file/{file}')->group(function () {
            Route::get('/show', 'show')->name('payment.file.show');
        });
    });

    ### DATA
    Route::controller(DataController::class)->group(function () {
        Route::prefix('file/{file}/data')->group(function () {
            Route::get('/index', 'index')->name('payment.data.index');
        });
    });
});
