<?php

use App\Http\Controllers\web\CalendarController;
use Illuminate\Support\Facades\Route;

Route::prefix('calendar')->group(function () {
    Route::get('/index/{year?}/{month?}', [CalendarController::class, 'index'])->name('calendar.index');
});
