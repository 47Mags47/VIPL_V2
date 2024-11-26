@extends('layouts.web')
@section('page-name', 'Выплаты')

@section('content')
    <x-table.box>
        <x-slot:thead>
            <x-table.row>
                <x-table.hcell title="UUID" />
                <x-table.hcell title="Статус" />
                <x-table.hcell title="Комментарий" />
                <x-table.hcell title="Файлов" />
                <x-table.hcell title="Данных" />
                <x-table.hcell />
            </x-table.row>
        </x-slot:thead>
        <x-slot:tbody>
            @foreach ($packages as $package)
                <x-table.row>
                    <x-table.cell :title="$package->uuid" />
                    <x-table.cell :title="$package->status->name" />
                    <x-table.cell :title="$package->comment" />
                    <x-table.cell :title="$package->files->count()" />
                    <x-table.cell :title="$package->data->count()" />
                    <x-table.cell>
                        <x-link.blue-button href="" title="Перейти" />
                    </x-table.cell>
                </x-table.row>
            @endforeach
        </x-slot:tbody>
    </x-table.box>
@endsection
