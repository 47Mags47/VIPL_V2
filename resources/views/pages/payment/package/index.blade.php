@extends('layouts.web')
@section('page-name', 'Выплаты')

@section('content')
    <x-table.box :paginator="$packages" search>
        <x-slot:optional-buttons>
            @if (request()->event->status_code === 'opened')
                <x-link.red-button :href="route('calendar.event.close', ['event' => request()->event])">
                    <x-buttons.ico close />
                </x-link.red-button>
            @endif
            <x-link.blue-button :href="route('raport.event', ['event' => request()->event])">
                <x-buttons.ico download />
            </x-link.blue-button>
        </x-slot:optional-buttons>
        <x-slot:thead>
            <x-table.row>
                <x-table.hcell title="UUID" w="300" sort="id" />
                <x-table.hcell title="Статус" w="75" sort="status_code" />
                <x-table.hcell title="Подразделение" sort="division" />
                <x-table.hcell title="Комментарий" />
                <x-table.hcell title="Файлов" w="75" />
                <x-table.hcell title="Данных" w="75" />
                <x-table.hcell title="На сумму" w="150" />
                <x-table.hcell ico />
            </x-table.row>
        </x-slot:thead>
        <x-slot:tbody>
            @php
                $file_count = 0;
                $data_count = 0;
                $summ_count = 0;
            @endphp
            @foreach ($packages as $package)
                @php
                    $file_count += $package->files->count();
                    $data_count += $package->data->count();
                    $this_summ_count = 0;

                    foreach (
                        $package->files->map(function ($file) {
                            return $file->AllSumm();
                        })
                        as $key => $value
                    ) {
                        $this_summ_count += $value;
                        $summ_count += $value;
                    }
                @endphp
                <x-table.row>
                    <x-table.cell :title="$package->id" />
                    <x-table.cell :title="$package->status->name" center />
                    <x-table.cell :title="$package->division->code . ' - ' . $package->division->name" />
                    <x-table.cell :title="$package->comment" />
                    <x-table.cell :title="number_format($package->files->count(), 0, '.', ' ')" center />
                    <x-table.cell :title="number_format($package->data->count(), 0, '.', ' ')" center />
                    <x-table.cell :title="number_format($this_summ_count, 0, '.', ' ')" center />
                    <x-table.cell has-button>
                        <x-link.blue-button :href="route('payment.file.index', compact('package'))">
                            <x-buttons.ico go />
                        </x-link.blue-button>
                    </x-table.cell>
                </x-table.row>
            @endforeach
            @if (count($packages) > 1)
                <x-table.row>
                    <x-table.cell :title="'Строк: ' . count($packages)" />
                    <x-table.cell title="Всего:" colspan=3 right bold/>
                    <x-table.cell :title="number_format($file_count, 0, '.', ' ')" center />
                    <x-table.cell :title="number_format($data_count, 0, '.', ' ')" center />
                    <x-table.cell :title="number_format($summ_count, 2, '.', ' ')" center />
                    <x-table.cell />
                </x-table.row>
            @endif
        </x-slot:tbody>
    </x-table.box>
@endsection
