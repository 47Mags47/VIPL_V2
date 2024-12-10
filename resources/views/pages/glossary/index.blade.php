@extends('layouts.web')
@section('page-name', 'Справочники')

@section('content')
    <x-table.box>
        <x-slot:thead>
            <x-table.row>
                <x-table.hcell title="Наименование" w=450 />
                <x-table.hcell title="Описание" />
                <x-table.hcell ico />
            </x-table.row>
        </x-slot:thead>
        <x-slot:tbody>

            <x-table.row>
                <x-table.cell title="Список банков" />
                <x-table.cell title="" />
                <x-table.cell>
                    <x-link.blue-button :href="route('glossary.bank.index')">
                        <x-buttons.ico go />
                    </x-link.blue-button>
                </x-table.cell>
            </x-table.row>

            <x-table.row>
                <x-table.cell title="Список подразделений" />
                <x-table.cell title="" />
                <x-table.cell>
                    <x-link.blue-button :href="route('glossary.division.index')">
                        <x-buttons.ico go />
                    </x-link.blue-button>
                </x-table.cell>
            </x-table.row>

            <x-table.row>
                <x-table.cell title="Список выплат" />
                <x-table.cell title="" />
                <x-table.cell>
                    <x-link.blue-button :href="route('glossary.payment.index')">
                        <x-buttons.ico go />
                    </x-link.blue-button>
                </x-table.cell>
            </x-table.row>

            <x-table.row>
                <x-table.cell title="Генераторы событий" />
                <x-table.cell title="" />
                <x-table.cell>
                    <x-link.blue-button :href="route('glossary.generator.rule.index')">
                        <x-buttons.ico go />
                    </x-link.blue-button>
                </x-table.cell>
            </x-table.row>

            <x-table.row>
                <x-table.cell title="События" />
                <x-table.cell title="" />
                <x-table.cell>
                    <x-link.blue-button :href="route('glossary.event.index')">
                        <x-buttons.ico go />
                    </x-link.blue-button>
                </x-table.cell>
            </x-table.row>

        </x-slot:tbody>
    </x-table.box>
@endsection
