@extends('layouts.web')
@section('page-name', 'Выплаты')

@section('content')
    <x-table.box>
        <x-slot:thead>
            <x-table.row>
                <x-table.hcell title="UUID" />
                <x-table.hcell title="Записей" />
                <x-table.hcell />
            </x-table.row>
        </x-slot:thead>
        <x-slot:tbody>
            @foreach ($files as $file)
                <x-table.row>
                    <x-table.cell :title="$file->id" />
                    <x-table.cell :title="$file->data->count()" />
                    <x-table.cell>
                        <x-link.blue-button :href="route('payment.data.index', compact('file'))" title="Перейти" />
                    </x-table.cell>
                </x-table.row>
            @endforeach
        </x-slot:tbody>
    </x-table.box>
@endsection
