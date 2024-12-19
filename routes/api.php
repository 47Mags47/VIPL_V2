<?php

use Illuminate\Support\Facades\Route;

Route::group([], [
    base_path('routes/api/auth.php'),
]);

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');
