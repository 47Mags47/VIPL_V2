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

        <h3>Договор</h3>
        <x-input.input label="Номер" name="contract.number" req />
        <x-input.input label="Наименование организации" name="contract.division_name" req />
        <x-input.input label="ИНН" name="contract.INN" req />
        <x-input.input label="Счёт организации" name="contract.division_account" req />
        <x-input.input label="БИК" name="contract.BIK" req />
    </x-form.box>
@endsection
