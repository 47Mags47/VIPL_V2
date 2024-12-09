@extends('layouts.web')
@section('page-name', 'генератор событий')

@section('content')
    <x-form.box :action="route('glossary.generator.rule.update', compact('rule'))" method="PUT" header="Правило" sbm="Сохранить" center>
        <x-input.input name="date_start" label="Дата начала" type="date" :value="$rule->date_start->format('Y-m-d')" req />
        <x-input.input name="date_end" label="Дата окончания" type="date" :value="$rule->date_end->format('Y-m-d')" req />
        <x-input.select name="period_code" label="Период">
            @foreach ($periods as $period)
                <x-input.option :title="$period->name" :value="$period->code" p-name='period_code' :select="$rule->period_code" />
            @endforeach
        </x-input.select>
        <x-input.area name="description" label="Описаание" :value="$rule->description" req />
    </x-form.box>
@endsection
