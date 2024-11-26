@extends('layouts.web')
@section('page-name', 'События')

@section('content')
    <x-form.box :action="route('calendar.event.store')" header="Событие" sbm="Добавить">
        <x-input.area name="title" label="Описание"/>
        <x-input.input name="date" type="date" label="Дата"/>
    </x-form.box>
@endsection
