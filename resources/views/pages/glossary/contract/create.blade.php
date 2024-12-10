@extends('layouts.web')
@section('page-name', 'Договор с банком')

@section('content')
    <x-form.box :action="route('glossary.contract.store', ['bank' => request()->bank])" header="Добавить запись" sbm="Добавить" center>
        <x-input.select name="payment_code" label="Выплата">
            @foreach ($payments as $payment)
                <x-input.option :title="$payment->code . ' - ' . $payment->name" :value="$payment->code" p-name='payment_code' />
            @endforeach
        </x-input.select>

        <x-input.input name="number" label="Номер Договора" req />
        <x-input.input name="division_name" label="Оранизация" req />
        <x-input.input name="INN" label="ИНН" req />
        <x-input.input name="division_account" label="Счёт" />
        <x-input.input name="BIK" label="БИК" req />
    </x-form.box>
@endsection
