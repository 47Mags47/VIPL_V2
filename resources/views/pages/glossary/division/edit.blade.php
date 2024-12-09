@extends('layouts.web')
@section('page-name', 'Список подразделений')

@section('content')
    <x-form.box :action="route('glossary.division.update', compact('division'))" method="PUT" header="Подразделение" sbm="Сохранить" center>
        <x-input.input name="code" label="Код" :value="$division->code" req />
        <x-input.input name="name" label="Наименование" :value="$division->name" req />
    </x-form.box>
@endsection
