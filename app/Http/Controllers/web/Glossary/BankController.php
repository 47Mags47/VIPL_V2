<?php

namespace App\Http\Controllers\web\Glossary;

use App\Http\Controllers\Controller;
use App\Models\Glossary\Bank;
use App\Models\Glossary\BankRaportType;
use App\Models\Glossary\Contract;
use App\Models\Glossary\RaportSheme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BankController extends Controller
{
    public function index()
    {
        $banks = Bank::search()->sort()->paginate(100);
        return view('pages.glossary.bank.index', [
            'banks' => $banks,
        ]);
    }

    public function create()
    {
        $shemes = RaportSheme::orderBy('code')->get();
        return view('pages.glossary.bank.create', compact('shemes'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'code'              => ['required', 'string', 'regex:/[0-9]{3}/', 'unique:glossary__banks,code'],
            'ru_code'           => ['required', 'string', 'min:3', 'max:10', 'unique:glossary__banks,ru_code'],
            'name'              => ['required', 'string', 'min:3', 'max:255'],
            'raport_sheme_code' => ['required', 'string', 'not_regex:/0/'],
        ]);

        Bank::create($validated);

        return redirect()->route('glossary.bank.index')->with('message', 'Запись успешно создана');
    }

    public function edit(Bank $bank)
    {
        $shemes = RaportSheme::orderBy('code')->get();
        return view('pages.glossary.bank.edit', compact('bank', 'shemes'));
    }

    public function update(Request $request, Bank $bank)
    {
        $validated = $request->validate([
            'ru_code'           => ['required', 'string', 'min:3', 'max:10'],
            'name'              => ['required', 'string', 'min:3', 'max:255'],
            'raport_sheme_code' => ['required', 'string', 'not_regex:/0/'],
        ]);

        $bank->update($validated);

        return redirect()->route('glossary.bank.index')->with('message', 'Запись успешно изменена');
    }

    public function delete(Bank $bank)
    {
        $bank->delete();
        return redirect()->route('glossary.bank.index')->with('message', 'Запись удалена');
    }
}
