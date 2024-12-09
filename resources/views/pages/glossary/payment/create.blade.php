@extends('layouts.web')
@section('page-name', 'Список подразделений')

@section('content')
    <x-form.box :action="route('glossary.payment.store')" header="Добавить выплату" sbm="Добавить" center>
        <x-input.input name="code" label="Код" req />
        <x-input.input name="name" label="Наименование" req />
        <x-input.input name="kbk" label="КБК" req />
    </x-form.box>
@endsection
