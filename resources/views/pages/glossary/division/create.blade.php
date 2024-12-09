@extends('layouts.web')
@section('page-name', 'Список подразделений')

@section('content')
    <x-form.box :action="route('glossary.division.store')" header="Добавить подразделение" sbm="Добавить" center>
        <x-input.input name="code" label="Код" req />
        <x-input.input name="name" label="Наименование" req />
    </x-form.box>
@endsection
