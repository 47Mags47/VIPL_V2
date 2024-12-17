<?php

use App\Http\Controllers\web\RaportController;
use Illuminate\Support\Facades\Route;

Route::controller(RaportController::class)->middleware(['auth', 'administration'])->group(function () {
    Route::get('/raport', 'index')->name('raport.index');
    Route::get('/raport/{raport}/download', 'download')->name('raport.download');

    Route::get('/raport/{event}/event-download', 'event')->name('raport.event');
});
