<?php
use Illuminate\Support\Facades\Route;

Route::middleware('web')->group([
    base_path('routes/web/calendar.php'),
    base_path('routes/web/package.php'),
    base_path('routes/web/raport.php'),
]);

Route::middleware('api')->group([

]);
