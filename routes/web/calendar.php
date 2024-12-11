<?php

use App\Http\Controllers\web\calendar\CalendarEventController;
use App\Http\Controllers\web\calendar\GeneratorController;
use Illuminate\Support\Facades\Route;

Route::prefix('calendar')->middleware('auth')->controller(CalendarEventController::class)->group(function () {
    Route::get('/index/{year?}/{month?}', 'index')->name('calendar.index');

    Route::prefix('event')->controller(CalendarEventController::class)->group(function () {
        Route::prefix('{event}')->group(function () {
            Route::get('/show', 'show')->name('calendar.event.show');
            Route::middleware('administration')->group(function () {
                Route::get('/check', 'check')->name('calendar.event.check');
                Route::get('/open', 'open')->name('calendar.event.open');
                Route::post('/open', 'open');
                Route::get('/close', 'close')->name('calendar.event.close');
            });
        });
    });

    Route::prefix('generator')->middleware('administration')->controller(GeneratorController::class)->group(function () {
        Route::get('/index', 'index')->name('calendar.generator.index');
        Route::post('/store', 'store')->name('calendar.generator.store');
    });
});
