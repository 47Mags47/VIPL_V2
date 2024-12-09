<?php

namespace App\Http\Controllers\web\Glossary;

use App\Http\Controllers\Controller;
use App\Models\Glossary\CalendarGeneratorRulePeriod;
use App\Models\Glossary\CalendarGeneratorRuleStatus;
use App\Models\Main\CalendarGeneratorRule;
use Illuminate\Http\Request;

class CalendarGeneratorRuleController extends Controller
{
    public function index()
    {
        $rules = CalendarGeneratorRule::orderBy('created_at')->paginate(100);
        return view('pages.glossary.calendar.generator.rule.index', [
            'rules' => $rules,
            'search' => $request->search ?? '',
        ]);
    }

    public function create()
    {
        $periods = CalendarGeneratorRulePeriod::orderBy('name')->get();
        return view('pages.glossary.calendar.generator.rule.create', compact('periods'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'date_start' => ['required', 'after:today'],
            'date_end' => ['required', 'after:date_start'],
            'period_code' => ['required', 'not_in:0'],
            'description' => ['required', 'string', 'min:8', 'max:255']
        ]);

        CalendarGeneratorRule::create(array_merge($validated, ['status_code' => 'valid']));

        return redirect()->route('glossary.generator.rule.index')->with('sys_message', 'Запись успешно создана');
    }

    public function edit(Request $request, CalendarGeneratorRule $rule)
    {
        $periods = CalendarGeneratorRulePeriod::orderBy('name')->get();
        return view('pages.glossary.calendar.generator.rule.edit', compact('periods', 'rule'));
    }

    public function update(Request $request, CalendarGeneratorRule $rule)
    {
        $validated = $request->validate([
            'date_start' => ['required', 'after:today'],
            'date_end' => ['required', 'after:date_start'],
            'period_code' => ['required', 'not_in:0'],
            'description' => ['required', 'string', 'min:8', 'max:255']
        ]);

        $rule->update($validated);
        return redirect()->route('glossary.generator.rule.index')->with('sys_message', 'Запись успешно изменена');
    }

    public function delete(Request $request, CalendarGeneratorRule $rule)
    {
        $rule->delete();
        return redirect()->route('glossary.generator.rule.index')->with('sys_message', 'Запись удалена');
    }
}
