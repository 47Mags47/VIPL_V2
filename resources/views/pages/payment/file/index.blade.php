@extends('layouts.web')
@section('page-name', 'Выплаты')

@section('back')
    <x-buttons.back :href="route('calendar.index')"/>
@endsection

@section('content')
    <x-table.box :paginator="$files" search>
        <x-slot:optional-buttons>
            <x-link.blue-button :href="route('payment.file.create', ['package' => request()->package])">
                <x-buttons.ico create />
            </x-link.blue-button>
        </x-slot:optional-buttons>
        <x-slot:thead>
            <x-table.row>
                <x-table.hcell title="UUID" w=300 sort="id" />
                <x-table.hcell title="Банк" w=400 sort="bank_code" />
                <x-table.hcell title="Статус" w=200 sort="status_code" />
                <x-table.hcell title="Загружен" />
                <x-table.hcell title="Дата загрузки" w=150 sort="created_at" />
                <x-table.hcell title="Записей" w=100 />
                <x-table.hcell title="На сумму" w=150 />
                <x-table.hcell title="Ошибок" w=100 />
                <x-table.hcell ico />
            </x-table.row>
        </x-slot:thead>
        <x-slot:tbody>
            @php
                $data_count = 0;
                $summ_count = 0;
                $error_count = 0;
            @endphp
            @foreach ($files as $file)
            @php
                $data_count += $file->data->count();
                $summ_count += $file->allSumm();
                $error_count += $file->errors()->dot()->count();
            @endphp
                <x-table.row>
                    <x-table.cell :title="$file->id" />
                    <x-table.cell :title="$file->bank->code . ' - ' . $file->bank->name" />
                    <x-table.cell :title="$file->status->name" />
                    <x-table.cell></x-table.cell>
                    <x-table.cell :title="$file->created_at->format('d.m.Y H:i')" center />
                    <x-table.cell :title="$file->data->count()" center />
                    <x-table.cell :title="number_format($file->allSumm(), 2, '.', ' ')" center />
                    <x-table.cell :title="$file->errors()->dot()->count()" center />
                    <x-table.cell>
                        <x-link.blue-button :href="route('payment.file.show', ['file' => $file])">
                            <x-buttons.ico go />
                        </x-link.blue-button>
                    </x-table.cell>
                </x-table.row>
            @endforeach
            @if ($files->count() > 1)
                <x-table.row>
                    <x-table.cell title="строк: {{ $files->count() }}" />
                    <x-table.cell title="Всего:" colspan=4 right bold />
                    <x-table.cell :title="number_format($data_count, 0, '.', ' ')" center />
                    <x-table.cell :title="number_format($summ_count, 2, '.', ' ')" center />
                    <x-table.cell :title="number_format($error_count, 0, '.', ' ')" center />
                    <x-table.cell />
                </x-table.row>
            @endif
        </x-slot:tbody>
    </x-table.box>
@endsection
