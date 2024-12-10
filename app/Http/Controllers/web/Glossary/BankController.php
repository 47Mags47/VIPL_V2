<?php

namespace App\Http\Controllers\web\Glossary;

use App\Http\Controllers\Controller;
use App\Models\Glossary\Bank;
use App\Models\Glossary\BankRaportType;
use App\Models\Glossary\Contract;
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
        $raport_types = BankRaportType::orderBy('code')->get();
        return view('pages.glossary.bank.create', compact('raport_types'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'bank_code' => ['required', 'string', 'regex:/[0-9]{3}/', 'unique:glossary__banks,code'],
            'bank_ru_code' => ['required', 'string', 'min:3', 'max:10', 'unique:glossary__banks,ru_code'],
            'bank_name' => ['required', 'string', 'min:3', 'max:255'],
            'bank_raport_type_code' => ['required', 'string', 'not_regex:/0/'],
        ]);

        Bank::create([
            'code' => $validated['bank_code'],
            'ru_code' => $validated['bank_ru_code'],
            'raport_type_code' => $validated['bank_raport_type_code'],
            'name' => $validated['bank_name'],
        ]);

        return redirect()->route('glossary.bank.index')->with('sys_message', 'Запись успешно создана');
    }

    public function edit(Bank $bank)
    {
        $raport_types = BankRaportType::orderBy('code')->get();
        return view('pages.glossary.bank.edit', compact('bank', 'raport_types'));
    }

    public function update(Request $request, Bank $bank)
    {
        $validated = $request->validate([
            'bank_ru_code' => ['required', 'string', 'min:3', 'max:10'],
            'bank_name' => ['required', 'string', 'min:3', 'max:255'],
            'bank_raport_type_code' => ['required', 'string', 'not_regex:/0/'],
        ]);

        $bank->update([
            'ru_code' => $validated['bank_ru_code'],
            'raport_type_code' => $validated['bank_raport_type_code'],
            'name' => $validated['bank_name'],
        ]);

        return redirect()->route('glossary.bank.index')->with('sys_message', 'Запись успешно изменена');
    }

    public function delete(Bank $bank)
    {
        $bank->delete();
        return redirect()->route('glossary.bank.index')->with('sys_message', 'Запись удалена');
    }
}
