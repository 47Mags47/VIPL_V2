<?php

namespace App\Http\Controllers\web\Glossary;

use App\Http\Controllers\Controller;
use App\Models\Glossary\Division;
use Illuminate\Http\Request;

class DivisionController extends Controller
{
    public function index()
    {
        $divisions = Division::orderBy('code')->paginate(100);
        return view('pages.glossary.division.index', [
            'divisions' => $divisions,
            'search' => $request->search ?? '',
        ]);
    }

    public function create()
    {
        return view('pages.glossary.division.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'code' => ['required', 'regex:/[0-9]{3}/'],
            'name' => ['required', 'string', 'min:3', 'max:255'],
        ]);

        Division::create($validated);

        return redirect()->route('glossary.division.index')->with('sys_message', 'Запись успешно создана');
    }

    public function edit(Request $request, Division $division)
    {
        return view('pages.glossary.division.edit', compact('division'));
    }

    public function update(Request $request, Division $division)
    {
        $validated = $request->validate([
            'code' => ['required', 'regex:/[0-9]{3}/'],
            'name' => ['required', 'string', 'min:3', 'max:255'],
        ]);

        $division->update($validated);

        return redirect()->route('glossary.division.index')->with('sys_message', 'Запись успешно изменена');
    }

    public function delete(Request $request, Division $division)
    {
        $division->delete();
        return redirect()->route('glossary.division.index')->with('sys_message', 'Запись удалена');
    }
}
