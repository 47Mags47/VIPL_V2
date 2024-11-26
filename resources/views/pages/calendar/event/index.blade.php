@extends('layouts.web')
@section('page-name', 'События')

@section('content')
    <x-table.box>
        <x-slot:thead>
            <x-table.row>
                <x-table.hcell title="Статус" />
                <x-table.hcell title="Наименование" />
                <x-table.hcell title="Дата" />
            </x-table.row>
            <x-slot:tbody>
                @foreach ($events as $event)
                    <x-table.row>
                        <x-table.cell :title="$event->status->name" />
                        <x-table.cell :title="$event->title" />
                        <x-table.cell :title="$event->daate->format('d.m.Y')" />
                    </x-table.row>
                @endforeach
            </x-slot:tbody>
        </x-slot:thead>
    </x-table.box>
@endsection
