<?php

namespace App\Http\Controllers\web\Glossary;

use App\Http\Controllers\Controller;
use App\Models\Glossary\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::search()->sort()->paginate(100);
        return view('pages.glossary.payment.index', [
            'payments' => $payments,
            'search' => $request->search ?? ''
        ]);
    }

    public function create()
    {
        return view('pages.glossary.payment.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'code' => ['required', 'regex:/([0-9]{3})|([0-9]{3}_[0-9])/'],
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'kbk' => ['required', 'regex:/[0-9]{20}/'],
        ]);

        Payment::create($validated);
        return redirect()->route('glossary.payment.index')->with('sys_message', 'Запись успешно создана');
    }


    public function edit(Request $request, Payment $payment)
    {
        return view('pages.glossary.payment.edit', compact('payment'));
    }

    public function update(Request $request, Payment $payment)
    {
        $validated = $request->validate([
            'code' => ['required', 'regex:/([0-9]{3})|([0-9]{3}_[0-9])/'],
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'kbk' => ['required', 'regex:/[0-9]{20}/'],
        ]);

        $payment->update($validated);
        return redirect()->route('glossary.payment.index')->with('sys_message', 'Запись успешно обновлена');
    }

    public function delete(Request $request, Payment $payment)
    {
        $payment->delete();
        return redirect()->route('glossary.payment.index')->with('sys_message', 'Запись удалена');
    }
}
