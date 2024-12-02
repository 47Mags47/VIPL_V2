<?php

use App\Http\Controllers\web\RaportController;
use Illuminate\Support\Facades\Route;

Route::controller(RaportController::class)->group(function () {
    Route::get('/raport', 'index')->name('raport.index');
    Route::get('/raport/{raport}/download', 'download')->name('raport.download');

    Route::get('/raport/{file}/file-download', 'file')->name('raport.file');
    Route::get('/raport/{package}/package-download', 'package')->name('raport.package');

    Route::get('/payment/{event}/raport', 'payment')->name('raport.payment');
});
