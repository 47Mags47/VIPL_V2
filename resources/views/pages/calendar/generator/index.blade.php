@extends('layouts.web')
@section('page-name', 'Генератор событий')

@section('content')
    {!! $create_dialog !!}

    <x-table.box>
        <x-slot:buttons>
            <x-buttons.dialog-open dialog="create-generator-dialog" title="Добавить"/>
        </x-slot:buttons>
        <x-slot:thead>
            <x-table.row>
                <x-table.hcell title="Текст" />
                <x-table.hcell title="Период" />
                <x-table.hcell title="Дата начала" />
                <x-table.hcell title="Дата окончания" />
                <x-table.hcell title="Статус" />
                <x-table.hcell />
                <x-table.hcell />
            </x-table.row>
        </x-slot:thead>
        <x-slot:tbody>
            @foreach ($rules as $rule)
                <x-table.row>
                    <x-table.cell :title="$rule->title" />
                    <x-table.cell :title="$rule->calculation->name" />
                    <x-table.cell :title="$rule->date_start->format('d.m.Y')" />
                    <x-table.cell :title="$rule->date_end->format('d.m.Y')" />
                    <x-table.cell :title="$rule->status->name" />
                    <x-table.cell>
                        <x-link.blue-button href="" title="Редактировать" />
                    </x-table.cell>
                    <x-table.cell>
                        <x-link.blue-button href="" title="Удалить" />
                    </x-table.cell>
                </x-table.row>
            @endforeach
        </x-slot:tbody>
    </x-table.box>
@endsection
