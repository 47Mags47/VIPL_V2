<?php

namespace App\Http\Controllers\web\calendar;

use App\Core\Classes\Calendar;
use App\Http\Controllers\Controller;
use App\Models\Main\CalendarEvent;
use Carbon\CarbonImmutable;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function index(Request $request, string $year = null, string $month = null){
        $year = $year ?? now()->format('Y');
        $month = $month ?? now()->format('m');

        $calendar = new Calendar($year, $month);
        return view('pages.calendar.index', compact('calendar'));
    }
}
