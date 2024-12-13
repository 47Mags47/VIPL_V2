@extends('layouts.web')
@section('page-name', 'Список выплат')

@section('content')
    <x-form.box center sbm="Сохранить" :action="route('glossary.bank.update', compact('bank'))" method="PUT" header="Банк">
        <x-input.input label="Код" name="code" :value="$bank->code" disabled />
        <x-input.input label="РУ Код" name="ru_code" :value="$bank->ru_code" req />
        <x-input.input label="Наименование" name="name" :value="$bank->name" req />
        <x-input.select label="Тип выгрузки" name="raport_sheme_code">
            @foreach ($shemes as $sheme)
                <x-input.option :title="$sheme->description" :value="$sheme->code" p-name="raport_sheme_code" :select="$bank->raport_sheme_code" />
            @endforeach
        </x-input.select>
    </x-form.box>
@endsection
