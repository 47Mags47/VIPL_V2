@extends('layouts.web')
@section('page-name', 'Выплаты')

@section('content')
    <x-flex-table.box flex="300px 100px 450px 1 100px 100px 150px 150px">
        <x-slot:optional-button>
            <x-link.blue-button :href="route('raport.payment', compact('event'))">
                <x-buttons.ico>
                    <i class="fa-solid fa-download"></i>
                </x-buttons.ico>
            </x-link.blue-button>
        </x-slot:optional-button>
        <x-slot:thead>
            <x-flex-table.row>
                <x-flex-table.cell title="UUID" />
                <x-flex-table.cell title="Статус" />
                <x-flex-table.cell title="Подразделение" />
                <x-flex-table.cell title="Комментарий" />
                <x-flex-table.cell title="Файлов" />
                <x-flex-table.cell title="Данных" />
                <x-flex-table.cell />
                <x-flex-table.cell />
            </x-flex-table.row>
        </x-slot:thead>
        <x-slot:tbody>
            @foreach ($packages as $package)
                <x-flex-table.row>
                    <x-flex-table.cell :title="$package->id" />
                    <x-flex-table.cell :title="$package->status->name" />
                    <x-flex-table.cell :title="$package->division->code . ' - ' . $package->division->name" />
                    <x-flex-table.cell :title="$package->comment" />
                    <x-flex-table.cell :title="$package->files->count()" />
                    <x-flex-table.cell :title="$package->data->count()" />
                    <x-flex-table.cell has-button>
                        <x-link.blue-button :href="route('raport.package', compact('package'))" title="Загрузить отчеты" />
                    </x-flex-table.cell>
                    <x-flex-table.cell has-button>
                        <x-link.blue-button :href="route('payment.file.index', compact('package'))" title="Перейти" />
                    </x-flex-table.cell>
                </x-flex-table.row>
            @endforeach
        </x-slot:tbody>
    </x-flex-table.box>
@endsection
