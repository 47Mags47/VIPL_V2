<?php

use App\Http\Controllers\web\RaportController;
use Illuminate\Support\Facades\Route;

Route::controller(RaportController::class)->group(function () {
    Route::get('/raport', 'index')->name('raport.index');
    Route::get('/raport/{raport}/download', 'download')->name('raport.download');


    Route::get('/payment/{event}/raport', 'payment')->name('raport.payment');
    Route::get('/package/{package}/raport', 'package')->name('raport.package');
});
