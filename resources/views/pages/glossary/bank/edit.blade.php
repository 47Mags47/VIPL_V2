@extends('layouts.web')
@section('page-name', 'Список выплат')

@section('content')
    <x-form.box center sbm="Сохранить" :action="route('glossary.bank.update', compact('bank'))" method="PUT" header="Банк">
        <x-input.input label="Код" name="bank.code" :value="$bank->code" disabled />
        <x-input.input label="РУ Код" name="bank.ru_code" :value="$bank->ru_code" req />
        <x-input.input label="Наименование" name="bank.name" :value="$bank->name" req />
        <x-input.select label="Тип выгрузки" name="bank.raport_type_code">
            @foreach ($raport_types as $type)
                <x-input.option :title="$type->name" :value="$type->code" p-name="bank.raport_type_code" :select="$bank->raport_type_code" />
            @endforeach
        </x-input.select>
    </x-form.box>
@endsection
