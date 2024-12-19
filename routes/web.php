<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group([],[
    base_path('routes/web/auth.php'),
    base_path('routes/web/glossary.php'),
    base_path('routes/web/calendar.php'),
    base_path('routes/web/package.php'),
    base_path('routes/web/raport.php'),
]);


