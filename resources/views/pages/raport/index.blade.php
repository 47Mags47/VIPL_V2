@extends('layouts.web')
@section('page-name', 'Отчеты')

@section('content')
    <x-table.box>
        <x-slot:thead>
            <x-table.row>
                <x-table.hcell title="Наименование" />
                <x-table.hcell title="Дата создания" w=150 />
                <x-table.hcell ico />
            </x-table.row>
        </x-slot:thead>
        <x-slot:tbody>
            @foreach ($raports as $raport)
                <x-table.row>
                    <x-table.cell :title="$raport->name" />
                    <x-table.cell :title="$raport->created_at->format('d.m.Y H:i')" center />
                    <x-table.cell>
                        <x-link.blue-button href="">
                            <x-buttons.ico>
                                <i class="fa-solid fa-download"></i>
                            </x-buttons.ico>
                        </x-link.blue-button>
                    </x-table.cell>
                </x-table.row>
            @endforeach
        </x-slot:tbody>
    </x-table.box>
@endsection
