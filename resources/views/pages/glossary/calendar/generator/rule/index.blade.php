@extends('layouts.web')
@section('page-name', 'генератор событий')

@section('content')
    <x-table.box :paginator="$rules" :$search>
        <x-slot:optional-buttons>
            <x-link.blue-button :href="route('glossary.generator.rule.create')">
                <x-buttons.ico create />
            </x-link.blue-button>
        </x-slot:optional-buttons>
        <x-slot:thead>
            <x-table.row>
                <x-table.hcell title="Дата начала" w=125 />
                <x-table.hcell title="Период" w=200 />
                <x-table.hcell title="Дата окончания" w=125 />
                <x-table.hcell title="Описание" />
                <x-table.hcell title="Статус" w=150 />
                <x-table.hcell ico rowspan=2 />
                <x-table.hcell ico rowspan=2 />
            </x-table.row>
        </x-slot:thead>
        <x-slot:tbody>
            @foreach ($rules as $rule)
                <x-table.row>
                    <x-table.cell :title="$rule->date_start->format('d.m.Y')" center />
                    <x-table.cell :title="$rule->period->name" />
                    <x-table.cell :title="$rule->date_end->format('d.m.Y')" center />
                    <x-table.cell :title="$rule->description" />
                    <x-table.cell :title="$rule->status->name" />
                    <x-table.cell>
                        <x-link.blue-button :href="route('glossary.generator.rule.edit', compact('rule'))">
                            <x-buttons.ico edit />
                        </x-link.blue-button>
                    </x-table.cell>
                    <x-table.cell>
                        <x-link.red-button :href="route('glossary.generator.rule.delete', compact('rule'))">
                            <x-buttons.ico delete />
                        </x-link.red-button>
                    </x-table.cell>
                </x-table.row>
            @endforeach
        </x-slot:tbody>
    </x-table.box>
@endsection
