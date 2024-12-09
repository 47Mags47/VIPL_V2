@extends('layouts.web')
@section('page-name', 'генератор событий')

@section('content')
    <x-form.box :action="route('glossary.generator.rule.store')" header="Добавить запись" sbm="Добавить" center>
        <x-input.input name="date_start" label="Дата начала" type="date" req />
        <x-input.input name="date_end" label="Дата окончания" type="date" req />
        <x-input.select name="period_code" label="Период">
            @foreach ($periods as $period)
                <x-input.option :title="$period->name" :value="$period->code" p-name='period_code' />
            @endforeach
        </x-input.select>
        <x-input.area name="description" label="Описаание" req />
    </x-form.box>
@endsection
