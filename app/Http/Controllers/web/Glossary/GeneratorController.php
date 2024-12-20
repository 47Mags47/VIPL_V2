<?php

namespace App\Http\Controllers\web\Glossary;

use App\Http\Controllers\Controller;
use App\Models\Glossary\CalendarGeneratorRulePeriod;
use App\Models\Glossary\Payment;
use App\Models\Main\CalendarEvent;
use App\Models\Main\CalendarGeneratorRule;
use Carbon\CarbonImmutable;
use Illuminate\Http\Request;

class GeneratorController extends Controller
{
    public function index()
    {
        $rules = CalendarGeneratorRule::search()->sort()->paginate(100);
        return view('pages.glossary.calendar.generator.rule.index', compact('rules'));
    }

    public function create()
    {
        $periods = CalendarGeneratorRulePeriod::orderBy('name')->get();
        $payments = Payment::orderBy('code')->get();
        return view('pages.glossary.calendar.generator.rule.create', compact('periods', 'payments'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'date_start' => ['required', 'after:today'],
            'date_end' => ['nullable', 'after:date_start'],
            'period_code' => ['required', 'exists:glossary__calendar__generator__rule_periods,code'],
            'only_weekday' => ['boolean'],
            'payment_code' => ['nullable', 'exists:glossary__payments,code'],
            'description' => ['nullable', 'string', 'min:6', 'max:255']
        ]);
        if ($validated['payment_code'] == null and $validated['description'] == null) return back()->withInput()->withErrors('Поле "Описание" должно быть заполнено, если не указана выплата');

        if($validated['description'] == null) $payment = Payment::whereKey($validated['payment_code'])->get()->first();
        $rule = CalendarGeneratorRule::create(array_merge($validated, [
            'status_code' => 'valid',
            'date_end' => $validated['date_end'] ?? now()->addYear(),
            'description' => $validated['description'] ?? $payment->code . ' - ' . $payment->name,
        ]));

        $period = CarbonImmutable::parse($rule->date_start)->toPeriod(CarbonImmutable::parse($rule->date_end), $rule->period->step);
        foreach ($period->toArray() as $day) {
            if($request->only_weekday and $day->isWeekend()){
                if(in_array($request->period_code, ['daily', 'weekly'])) continue;
                if(in_array($request->period_code, ['monthly', 'quarterly', 'yearly'])) $day = $day->nextWeekday();
            }

            CalendarEvent::updateOrCreate([
                'rule_id' => $rule->id,
                'date' => $day,
                'payment_code' => $validated['payment_code'] !== 0 ? $validated['payment_code'] : null
            ], [
                'status_code' => 'future',
                'description' => $rule->description,
            ]);
        }

        return redirect()->route('glossary.generator.rule.index')->with('sys_message', 'Запись успешно создана');
    }

    public function edit(CalendarGeneratorRule $rule)
    {
        $periods = CalendarGeneratorRulePeriod::orderBy('name')->get();
        $payments = Payment::orderBy('code')->get();
        return view('pages.glossary.calendar.generator.rule.edit', compact('periods', 'payments', 'rule'));
    }

    public function update(Request $request, CalendarGeneratorRule $rule)
    {
        $validated = $request->validate([
            'date_end' => ['required', 'after:date_start'],
            'description' => ['required', 'string', 'min:8', 'max:255']
        ]);

        $rule->update($validated);

        foreach ($rule->events as $event) {
            if ($event->date > $rule->date_end) $event->delete();
        }

        $period = CarbonImmutable::parse($rule->date_start)->toPeriod(CarbonImmutable::parse($rule->date_end), $rule->period->step);
        foreach ($period->toArray() as $day) {
            CalendarEvent::updateOrCreate([
                'rule_id' => $rule->id,
                'date' => $day,
            ], [
                'status_code' => 'future',
                'description' => $rule->description,
            ]);
        }

        return redirect()->route('glossary.generator.rule.index')->with('sys_message', 'Запись успешно изменена');
    }

    public function delete(CalendarGeneratorRule $rule)
    {
        foreach ($rule->afterEvents() as $event) {
            $event->delete();
        }

        $rule->setStatus('deleted');
        $rule->delete();

        return redirect()->route('glossary.generator.rule.index')->with('sys_message', 'Запись удалена');
    }
}
