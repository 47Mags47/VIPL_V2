<?php

use App\Http\Controllers\web\calendar\CalendarController;
use App\Http\Controllers\web\calendar\EventController;
use App\Http\Controllers\web\calendar\GeneratorController;
use Illuminate\Support\Facades\Route;

Route::prefix('calendar')->controller(CalendarController::class)->group(function () {
    Route::get('/index/{year?}/{month?}', 'index')->name('calendar.index');

    Route::prefix('generator')->controller(GeneratorController::class)->group(function () {
        Route::get('/index', 'index')->name('calendar.generator.index');
        Route::post('/store', 'store')->name('calendar.generator.store');
    });
});
