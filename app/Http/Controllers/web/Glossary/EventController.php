<?php

namespace App\Http\Controllers\web\Glossary;

use App\Http\Controllers\Controller;
use App\Models\Main\CalendarEvent;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = CalendarEvent::search()->sort()->paginate(100);
        return view('pages.glossary.event.index', compact('events'));
    }

    public function create()
    {
        return view('pages.glossary.event.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'date' => ['required', 'date', 'after:today'],
            'description' => ['required', 'string', 'min:8', 'max:255'],
        ]);

        CalendarEvent::create(array_merge($validated, ['status_code' => 'future']));
        return redirect()->route('glossary.event.index')->with('sys_message', 'Запись успешно добавлена');
    }

    public function open(CalendarEvent $event)
    {
        $event->update(['status_code' => 'opened']);
        return redirect()->route('glossary.event.index')->with('sys_message', 'Событие открыто');
    }

    public function close(CalendarEvent $event)
    {
        $event->update(['status_code' => 'closed']);
        return redirect()->route('glossary.event.index')->with('sys_message', 'Событие зфкрыто');
    }

    public function edit(CalendarEvent $event)
    {
        return view('pages.glossary.event.edit', compact('event'));
    }

    public function update(Request $request, CalendarEvent $event)
    {
        $validated = $request->validate([
            'date' => ['required', 'date', 'after:today'],
            'description' => ['required', 'string', 'min:8', 'max:255'],
        ]);

        $event->update($validated);
        return redirect()->route('glossary.event.index')->with('sys_message', 'Запись успешно обновлена');
    }

    public function delete(CalendarEvent $event)
    {
        $event->delete();
        return redirect()->route('glossary.event.index')->with('sys_message', 'Запись удалена');
    }
}
