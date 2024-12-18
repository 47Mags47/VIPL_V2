@extends('layouts.web')
@section('page-name', 'Список Выплат')

@section('back')
    <x-buttons.back :href="route('glossary.index')"/>
@endsection

@section('content')
    <x-table.box :paginator="$payments" search>
        <x-slot:optional-buttons>
            <x-link.blue-button :href="route('glossary.payment.create')">
                <x-buttons.ico create />
            </x-link.blue-button>
        </x-slot:optional-buttons>
        <x-slot:thead>
            <x-table.row>
                <x-table.hcell title="Код" w="50" sort="code" />
                <x-table.hcell title="Наименование" sort="name" />
                <x-table.hcell title="КБК" w="200" sort="kbk" />
                <x-table.hcell ico rowspan=2 />
                <x-table.hcell ico rowspan=2 />
            </x-table.row>
        </x-slot:thead>
        <x-slot:tbody>
            @foreach ($payments as $payment)
                <x-table.row>
                    <x-table.cell :title="$payment->code" center />
                    <x-table.cell :title="$payment->name" />
                    <x-table.cell :title="$payment->kbk" />
                    <x-table.cell>
                        <x-link.blue-button :href="route('glossary.payment.edit', compact('payment'))">
                            <x-buttons.ico edit />
                        </x-link.blue-button>
                    </x-table.cell>
                    <x-table.cell>
                        <x-link.red-button :href="route('glossary.payment.delete', compact('payment'))">
                            <x-buttons.ico delete />
                        </x-link.red-button>
                    </x-table.cell>
                </x-table.row>
            @endforeach
        </x-slot:tbody>
    </x-table.box>
@endsection
