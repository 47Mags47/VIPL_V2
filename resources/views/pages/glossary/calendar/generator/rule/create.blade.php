@extends('layouts.web')
@section('page-name', 'генератор событий')

@section('content')
    <x-form.box :action="route('glossary.generator.rule.store')" header="Добавить запись" sbm="Добавить" center>
        <x-input.input name="date_start" label="Дата начала" type="date" req />
        <x-input.input name="date_end" label="Дата окончания" type="date" />
        <x-input.select name="period_code" label="Период">
            @foreach ($periods as $period)
                <x-input.option :title="$period->name" :value="$period->code" p-name='period_code' />
            @endforeach
        </x-input.select>
        <x-input.check name="only_weekday" label="Только рабочие дни"/>
        <x-input.select name="payment_code" label="Выплата">
            @foreach ($payments as $payment)
                <x-input.option :title="$payment->code . ' - ' . $payment->name" :value="$payment->code" p-name='payment_code' />
            @endforeach
        </x-input.select>
        <x-input.area name="description" label="Описаание" />
    </x-form.box>
@endsection
