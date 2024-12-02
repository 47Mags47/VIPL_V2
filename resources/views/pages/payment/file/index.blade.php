@extends('layouts.web')
@section('page-name', 'Выплаты')

@section('content')
    {!! $create_dialog !!}

    <x-table.box>
        <x-slot:optional-buttons>
            <x-buttons.dialog-open class="ico-button blue-button" dialog="create-file-dialog">
                <i class="fa-solid fa-plus"></i>
            </x-buttons.dialog-open>
        </x-slot:optional-buttons>
        <x-slot:thead>
            <x-table.row>
                <x-table.hcell title="UUID" w=350 />
                <x-table.hcell title="Банк" />
                <x-table.hcell title="Статус" />
                <x-table.hcell title="Записей" />
                <x-table.hcell title="Ошибок" />
                <x-table.hcell title="Дата загрузки" />
                <x-table.hcell ico />
            </x-table.row>
        </x-slot:thead>
        <x-slot:tbody>
            @foreach ($files as $file)
            <x-table.row>
                <x-table.cell :title="$file->id" />
                <x-table.cell :title="$file->bank->code . ' - ' . $file->bank->name" />
                <x-table.cell :title="$file->status->name" />
                <x-table.cell :title="$file->data->count()" />
                <x-table.cell :title="$file->errors()" />
                <x-table.cell :title="$file->created_at->format('d.m.Y H:i')" />
                <x-table.cell>
                    <x-link.blue-button :href="route('payment.data.index', compact('file'))">
                        <x-buttons.ico>
                            <i class="fa-solid fa-up-right-from-square"></i>
                        </x-buttons.ico>
                    </x-link.blue-button>
                </x-table.cell>
            </x-table.row>
            @endforeach
        </x-slot:tbody>
    </x-table.box>
@endsection
