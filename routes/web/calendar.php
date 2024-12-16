<?php

use App\Http\Controllers\web\CalendarController;
use Illuminate\Support\Facades\Route;

Route::prefix('calendar')->middleware('auth')->controller(CalendarController::class)->group(function () {
    Route::get('/index/{year?}/{month?}', 'index')->name('calendar.index');
    Route::prefix('event/{event}')->group(function () {
        Route::get('/show', 'show')->name('calendar.event.show');
        Route::middleware('administration')->group(function () {
            Route::get('/check', 'check')->name('calendar.event.check');
            Route::get('/open', 'open')->name('calendar.event.open');
            Route::post('/open', 'open');
            Route::get('/close', 'close')->name('calendar.event.close');
        });
    });
});
