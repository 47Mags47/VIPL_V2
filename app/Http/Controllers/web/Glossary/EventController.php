<?php

namespace App\Http\Controllers\web\Glossary;

use App\Core\Classes\Calendar;
use App\Http\Controllers\Controller;
use App\Models\Main\CalendarEvent;
use App\Models\Main\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function index(Request $request, string $year = null, string $month = null)
    {
        $year = $year ?? now()->format('Y');
        $month = $month ?? now()->format('m');

        $calendar = new Calendar($year, $month);

        return view('pages.calendar.index', compact('calendar'));
    }

    public function open(Request $request, CalendarEvent $event)
    {
        if ($request->method() === 'POST') {
            $event->update(['status_code' => 'opened']);
            return redirect()->route('calendar.index')->with('sys_message', 'Выплата открыта');
        }
        return view('pages.calendar.event.open', compact('event'));
    }

    public function close(CalendarEvent $event){
        $event->update(['status_code' => 'closed']);
        return redirect()->route('calendar.index')->with('sys_message', 'Выплата закрыта');
    }

    public function show(Request $request, CalendarEvent $event)
    {
        if ($request->user()->isAdministration()) {
            if ($event->status_code == 'opened') return redirect()->route('payment.package.index', compact('event'));
            if ($event->status_code == 'closed') return redirect()->route('payment.package.index', compact('event'));
            if ($event->status_code == 'future') return redirect()->route('calendar.event.open', compact('event'));
        } else {
            if ($event->status_code == 'opened') {
                $package = Package::firstOrCreate([
                    'event_id' => $event->id,
                    'division_code' => Auth::user()->division_code
                ], [
                    'status_code' => 'created'
                ]);
                return redirect()->route('payment.package.show', compact('package'));
            }
            if ($event->status_code == 'closed') {
                $package = Package::where('event_id', $event->id)->where('division_code', Auth::user()->division_code)->get();
                return $package !== null
                    ? redirect()->route('payment.package.show', compact('package'))
                    : back()->withErrors('Пакет не найден');
            }
            if ($event->status_code == 'future') return redirect()->route('calendar.index')->with('sys_error', 'Выплата еще закрыта');
        }
        return back()->withErrors('Действие не авторизовано');
    }
}
