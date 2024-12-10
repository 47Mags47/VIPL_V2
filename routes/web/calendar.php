<?php

use App\Http\Controllers\web\calendar\CalendarController;
use App\Http\Controllers\web\calendar\GeneratorController;
use Illuminate\Support\Facades\Route;

Route::prefix('calendar')->middleware('auth')->controller(CalendarController::class)->group(function () {
    Route::get('/index/{year?}/{month?}', 'index')->name('calendar.index');

    Route::prefix('generator')->middleware('administration')->controller(GeneratorController::class)->group(function () {
        Route::get('/index', 'index')->name('calendar.generator.index');
        Route::post('/store', 'store')->name('calendar.generator.store');
    });
});
