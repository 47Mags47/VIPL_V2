@extends('layouts.web')
@section('page-name', 'Список подразделений')

@section('content')
    <x-form.box :action="route('glossary.event.update', compact('event'))" method="PUT" header="Событие" sbm="Сохранить" center>
        <x-input.input name="date" label="Дата" type="date" :value="$event->date->format('Y-m-d')" req />
        <x-input.area name="description" label="Описание" :value="$event->description" />
    </x-form.box>
@endsection
