<?php

use App\Http\Controllers\web\calendar\CalendarController;
use App\Http\Controllers\web\calendar\EventController;
use Illuminate\Support\Facades\Route;

Route::prefix('event')->controller(EventController::class)->group(function () {
    Route::get('/index', 'index')->name('calendar.event.index');
});

Route::prefix('calendar')->controller(CalendarController::class)->group(function () {
    Route::get('/index/{year?}/{month?}', 'index')->name('calendar.index');
});
