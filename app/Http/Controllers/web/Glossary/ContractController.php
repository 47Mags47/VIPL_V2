<?php

namespace App\Http\Controllers\web\Glossary;

use App\Http\Controllers\Controller;
use App\Models\Glossary\Bank;
use App\Models\Glossary\Contract;
use App\Models\Glossary\Payment;
use Illuminate\Http\Request;

class ContractController extends Controller
{
    public function index(Bank $bank)
    {
        $contracts = $bank->contracts()->search()->sort()->paginate(100);
        return view('pages.glossary.contract.index', compact('contracts'));
    }

    public function create()
    {
        $payments = Payment::orderBy('code')->get();
        return view('pages.glossary.contract.create', compact('payments'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'payment_code' => ['required', 'regex:/[0-9]{3}/'],
            'number' => ['required', 'numeric'],
            'division_name' => ['required', 'string', 'min:3', 'max:255'],
            'INN' => ['required', 'string', 'regex:/[0-9]{10}/'],
            'division_account' => ['nullable'],
            'BIK' => ['required', 'string', 'regex:/[0-9]{10}/'],
        ]);

        Contract::create(array_merge($validated, [
            'bank_code' => request()->bank,
            'division_account' => $validated['division_account'] ?? ''
        ]));

        return redirect()->route('glossary.contract.index', ['bank' => request()->bank])->with('sys_message', 'Запись успешно добавлена');
    }

    public function edit(Bank $bank, Contract $contract)
    {
        $payments = Payment::orderBy('code')->get();
        return view('pages.glossary.contract.edit', compact('payments', 'contract'));
    }

    public function update(Request $request, Bank $bank, Contract $contract)
    {
        $validated = $request->validate([
            'number' => ['required', 'numeric'],
            'division_name' => ['required', 'string', 'min:3', 'max:255'],
            'INN' => ['required', 'string', 'regex:/[0-9]{10}/'],
            'division_account' => ['nullable'],
            'BIK' => ['required', 'string', 'regex:/[0-9]{10}/'],
        ]);

        $contract->update(array_merge($validated, ['division_account' => $validated['division_account'] ?? '']));
        return redirect()->route('glossary.contract.index', compact('bank'))->with('sys_message', 'Запись успешно обновлена');
    }

    public function delete(Bank $bank, Contract $contract)
    {
        $contract->delete();
        return redirect()->route('glossary.contract.index', compact('bank'))->with('sys_message', 'Запись удалена');
    }
}
