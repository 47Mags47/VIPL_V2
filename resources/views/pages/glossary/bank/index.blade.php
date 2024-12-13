@extends('layouts.web')
@section('page-name', 'Список банков')

@section('content')
    <x-table.box :paginator="$banks" search>
        <x-slot:optional-buttons>
            <x-link.blue-button :href="route('glossary.bank.create')">
                <x-buttons.ico create />
            </x-link.blue-button>
        </x-slot:optional-buttons>
        <x-slot:thead>
            <x-table.row>
                <x-table.hcell title="Код" w="50" sort="code" />
                <x-table.hcell title="Ру Код" w="150" sort="ru_code" />
                <x-table.hcell title="Наименование" sort="name" />
                <x-table.hcell title="Схема" sort="name" />
                <x-table.hcell ico />
                <x-table.hcell ico />
                <x-table.hcell ico />
            </x-table.row>
        </x-slot:thead>
        <x-slot:tbody>
            @foreach ($banks as $bank)
                <x-table.row>
                    <x-table.cell :title="$bank->code" center />
                    <x-table.cell :title="$bank->ru_code" />
                    <x-table.cell :title="$bank->name" />
                    <x-table.cell :title="$bank->sheme ? $bank->sheme->description : ''" />
                    <x-table.cell>
                        <x-link.blue-button :href="route('glossary.contract.index', compact('bank'))">
                            <x-buttons.ico go />
                        </x-link.blue-button>
                    </x-table.cell>
                    <x-table.cell>
                        <x-link.blue-button :href="route('glossary.bank.edit', compact('bank'))">
                            <x-buttons.ico edit />
                        </x-link.blue-button>
                    </x-table.cell>
                    <x-table.cell>
                        <x-link.red-button :href="route('glossary.bank.delete', compact('bank'))">
                            <x-buttons.ico delete />
                        </x-link.red-button>
                    </x-table.cell>
                </x-table.row>
            @endforeach
        </x-slot:tbody>
    </x-table.box>
@endsection
