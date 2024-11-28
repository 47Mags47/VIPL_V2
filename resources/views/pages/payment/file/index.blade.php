@extends('layouts.web')
@section('page-name', 'Выплаты')

@section('content')
    {!! $create_dialog !!}

    <x-flex-table.box flex="300px 1 200px 75px 75px 150px 100px">
        <x-slot:buttons>
            <x-buttons.dialog-open dialog="create-file-dialog" title="Загрузить" />
        </x-slot:buttons>
        <x-slot:thead>
            <x-flex-table.rox>
                <x-flex-table.cell title="UUID" />
                <x-flex-table.cell title="Банк" />
                <x-flex-table.cell title="Статус" />
                <x-flex-table.cell title="Записей" />
                <x-flex-table.cell title="Ошибок" />
                <x-flex-table.cell title="Дата загрузки" />
                <x-flex-table.cell has-button />
            </x-flex-table.rox>
        </x-slot:thead>
        <x-slot:tbody>
            @foreach ($files as $file)
                <x-flex-table.rox>
                    <x-flex-table.cell :title="$file->id" />
                    <x-flex-table.cell :title="$file->bank->code . ' - ' . $file->bank->name" />
                    <x-flex-table.cell :title="$file->status->name" />
                    <x-flex-table.cell :title="$file->data->count()" center />
                    <x-flex-table.cell :title="$file->errors()" center />
                    <x-flex-table.cell :title="$file->created_at->format('d.m.Y H:i')" center />
                    <x-flex-table.cell has-button>
                        <x-link.blue-button :href="route('payment.data.index', compact('file'))" title="Перейти" />
                    </x-flex-table.cell>
                </x-flex-table.rox>
            @endforeach
        </x-slot:tbody>
    </x-flex-table.box>
@endsection
