<?php

namespace App\Http\Controllers\web\calendar;

use App\Http\Controllers\Controller;
use App\Models\Glossary\CalendarEventStatus;
use App\Models\Main\CalendarEvent;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(){
        $events = CalendarEvent::all();
        return view('pages.calendar.event.index', compact('events'));
    }

    public function create(){
        return view('pages.calendar.event.create');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'title' => ['required', 'string', 'min:10', 'max:255'],
            'date' => ['required', 'date'],
        ]);

        CalendarEvent::create($validated);

        return redirect()->route('calendar.event.index');
    }
}
