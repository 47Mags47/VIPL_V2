<?php

namespace App\Http\Controllers\web\calendar;

use App\Core\Classes\Calendar;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function index(){
        $calendar = new Calendar();
        $weeks = $calendar->getPeriodEvents();
        return view('pages.calendar.index', compact('weeks'));
    }
}
