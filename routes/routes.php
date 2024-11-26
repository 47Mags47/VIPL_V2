<?php
use Illuminate\Support\Facades\Route;

Route::middleware('web')->group([
    base_path('routes/web/calendar.php'),
]);

Route::middleware('api')->group([

]);
