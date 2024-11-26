<?php

namespace App\Http\Controllers\web\calendar;

use App\Http\Controllers\Controller;
use App\Models\Main\CalendarEvent;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(){
        $events = CalendarEvent::all();
        return view('pages.calendar.event.index', compact('events'));
    }
}
