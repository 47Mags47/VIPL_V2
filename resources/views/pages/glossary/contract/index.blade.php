@extends('layouts.web')
@section('page-name', 'Список банков')

@section('back')
    <x-buttons.back :href="route('glossary.bank.index')"/>
@endsection

@section('content')
    <x-table.box :paginator="$contracts" search>
        <x-slot:optional-buttons>
            <x-link.blue-button :href="route('glossary.contract.create', ['bank' => request()->bank])">
                <x-buttons.ico create />
            </x-link.blue-button>
        </x-slot:optional-buttons>
        <x-slot:thead>
            <x-table.row>
                <x-table.hcell title="Выплата" sort="payment_code" />
                <x-table.hcell title="Номер договора" w=150 />
                <x-table.hcell title="Наименование организации" w=250 />
                <x-table.hcell title="ИНН" w=150 />
                <x-table.hcell title="Счёт" w=150 />
                <x-table.hcell title="БИК" w=150 />
                <x-table.hcell ico />
                <x-table.hcell ico />
            </x-table.row>
        </x-slot:thead>
        <x-slot:tbody>
            @foreach ($contracts as $contract)
                <x-table.row>
                    <x-table.cell :title="$contract->payment->code . ' - ' . $contract->payment->name" />
                    <x-table.cell :title="$contract->number" />
                    <x-table.cell :title="$contract->division_name" />
                    <x-table.cell :title="$contract->INN" />
                    <x-table.cell :title="$contract->division_account" />
                    <x-table.cell :title="$contract->BIK" />
                    <x-table.cell>
                        <x-link.blue-button :href="route('glossary.contract.edit', ['bank' => request()->bank, 'contract' => $contract])">
                            <x-buttons.ico edit />
                        </x-link.blue-button>
                    </x-table.cell>
                    <x-table.cell>
                        <x-link.red-button :href="route('glossary.contract.delete', ['bank' => request()->bank, 'contract' => $contract])">
                            <x-buttons.ico delete />
                        </x-link.red-button>
                    </x-table.cell>
                </x-table.row>
            @endforeach
        </x-slot:tbody>
    </x-table.box>
@endsection
