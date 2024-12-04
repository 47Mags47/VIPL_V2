@extends('layouts.web')
@section('page-name', 'Выплаты')

@section('content')
    {!! $create_dialog !!}

    <x-table.box :paginator="$files" :$search>
        <x-slot:optional-buttons>
            <x-buttons.dialog-open class="ico-button blue-button" dialog="create-file-dialog">
                <i class="fa-solid fa-plus"></i>
            </x-buttons.dialog-open>
            <x-link.blue-button :href="route('raport.package', compact('package'))">
                <x-buttons.ico download />
            </x-link.blue-button>
        </x-slot:optional-buttons>
        <x-slot:thead>
            <x-table.row>
                <x-table.hcell title="UUID" w=300 sort="id" />
                <x-table.hcell title="Банк" sort="bank" />
                <x-table.hcell title="Статус" w=200 sort="status" />
                <x-table.hcell title="Записей" w=100 />
                <x-table.hcell title="Ошибок" w=100 />
                <x-table.hcell title="Дата загрузки" w=150 sort="created" />
                <x-table.hcell ico />
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
                        <x-link.blue-button :href="route('raport.file', compact('file'))">
                            <x-buttons.ico download />
                        </x-link.blue-button>
                    </x-table.cell>
                <x-table.cell>
                    <x-link.blue-button :href="route('payment.data.index', compact('file'))">
                        <x-buttons.ico go />
                    </x-link.blue-button>
                </x-table.cell>
            </x-table.row>
            @endforeach
        </x-slot:tbody>
    </x-table.box>
@endsection
