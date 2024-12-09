@extends('layouts.web')
@section('page-name', 'Список подразделений')

@section('content')
    <x-table.box :paginator="$divisions" :$search>
        <x-slot:optional-buttons>
            <x-link.blue-button :href="route('glossary.division.create')">
                <x-buttons.ico create />
            </x-link.blue-button>
        </x-slot:optional-buttons>
        <x-slot:thead>
            <x-table.row>
                <x-table.hcell title="Код" w="50" />
                <x-table.hcell title="Наименование" />
                <x-table.hcell ico rowspan=2 />
                <x-table.hcell ico rowspan=2 />
            </x-table.row>
        </x-slot:thead>
        <x-slot:tbody>
            @foreach ($divisions as $division)
                <x-table.row>
                    <x-table.cell :title="$division->code" center />
                    <x-table.cell :title="$division->name" />
                    <x-table.cell>
                        <x-link.blue-button :href="route('glossary.division.edit', compact('division'))">
                            <x-buttons.ico edit />
                        </x-link.blue-button>
                    </x-table.cell>
                    <x-table.cell>
                        <x-link.red-button :href="route('glossary.division.delete', compact('division'))">
                            <x-buttons.ico delete />
                        </x-link.red-button>
                    </x-table.cell>
                </x-table.row>
            @endforeach
        </x-slot:tbody>
    </x-table.box>
@endsection
