@extends('layouts.web')
@section('page-name', 'Отчеты')

@section('content')
<x-flex-table.box flex="1 150px 50px ">
    <x-slot:thead>
        <x-flex-table.row>
            <x-flex-table.cell title="Наименование" />
            <x-flex-table.cell title="Дата создания" />
            <x-flex-table.cell has-button />
        </x-flex-table.row>
    </x-slot:thead>
    <x-slot:live-body>
        <livewire:table.raport/>
    </x-slot:live-body>
</x-flex-table.box>
@endsection
