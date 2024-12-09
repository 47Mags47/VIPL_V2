@extends('layouts.web')
@section('page-name', 'Список подразделений')

@section('content')
    <x-form.box :action="route('glossary.payment.update', compact('payment'))" method="PUT" header="Выплата" sbm="Сохранить" center>
        <x-input.input name="code" label="Код" :value="$payment->code" req />
        <x-input.input name="name" label="Наименование" :value="$payment->name" req />
        <x-input.input name="kbk" label="КБК" :value="$payment->kbk" req />
    </x-form.box>
@endsection
