@extends('layouts.web')
@section('page-name', 'Список выплат')

@section('content')
    <x-form.box center sbm="Добавить" :action="route('glossary.bank.store')" header="Банк">
        <x-input.input label="Код" name="bank.code" req />
        <x-input.input label="РУ Код" name="bank.ru_code" req />
        <x-input.input label="Наименование" name="bank.name" req />
        <x-input.select label="Тип выгрузки" name="bank.raport_type_code">
            @foreach ($raport_types as $type)
                <x-input.option :title="$type->name" :value="$type->code" p-name="bank.raport_type_code" />
            @endforeach
        </x-input.select>
    </x-form.box>
@endsection
