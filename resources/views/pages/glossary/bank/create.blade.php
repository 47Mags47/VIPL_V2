@extends('layouts.web')
@section('page-name', 'Список выплат')

@section('content')
    <x-form.box center sbm="Добавить" :action="route('glossary.bank.store')" header="Банк">
        <x-input.input label="Код" name="code" req />
        <x-input.input label="РУ Код" name="ru_code" req />
        <x-input.input label="Наименование" name="name" req />
        <x-input.select label="Тип выгрузки" name="raport_sheme_code">
            @foreach ($shemes as $sheme)
                <x-input.option :title="$sheme->description" :value="$sheme->code" p-name="raport_sheme_code" />
            @endforeach
        </x-input.select>
    </x-form.box>
@endsection
