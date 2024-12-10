@extends('layouts.web')
@section('page-name', 'Договор с банком')

@section('content')
    <x-form.box :action="route('glossary.contract.update', ['bank' => request()->bank, 'contract' => $contract])" method="PUT" header="Договор" sbm="Сохранить" center>
        <x-input.select name="payment_code" label="Выплата" disabled>
            @foreach ($payments as $payment)
                <x-input.option :title="$payment->code . ' - ' . $payment->name" :value="$payment->code" p-name='payment_code' />
            @endforeach
        </x-input.select>

        <x-input.input name="number" label="Номер Договора" :value="$contract->number" req />
        <x-input.input name="division_name" label="Оранизация" :value="$contract->division_name" req />
        <x-input.input name="INN" label="ИНН" :value="$contract->INN" req />
        <x-input.input name="division_account" :value="$contract->division_account" label="Счёт" />
        <x-input.input name="BIK" label="БИК" :value="$contract->BIK" req />
    </x-form.box>
@endsection
