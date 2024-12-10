@extends('layouts.web')
@section('page-name', 'Список подразделений')

@section('content')
    <x-form.box :action="route('glossary.event.store')" header="Добавить событие" sbm="Добавить" center>
        <x-input.input name="date" label="Дата" type="date" req />
        <x-input.area name="description" label="Описание" />
    </x-form.box>
@endsection
