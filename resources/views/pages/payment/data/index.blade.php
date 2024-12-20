@extends('layouts.web')
@section('page-name', 'Выплаты')

@section('back')
    <x-buttons.back :href="route('payment.package.show', ['package' => $file->package])"/>
@endsection

@section('content')
    <x-table.box :paginator="$data" search>
        <x-slot:thead>
            <x-table.row>
                <x-table.hcell title="Фамилия" sort="last_name" />
                <x-table.hcell title="Имя" sort="first_name" />
                <x-table.hcell title="Отчество" sort="middle_name" />
                <x-table.hcell title="Счёт" w=200 sort="account" />
                <x-table.hcell title="Сумма" w=75 />
                <x-table.hcell title="Пасп" w=100 />
                <x-table.hcell title="ДР" w=90 />
                <x-table.hcell title="КБК" />
                <x-table.hcell title="СНИЛС" w=125 />
                <x-table.hcell title="Ошибки" w=500 sort="errors" />
            </x-table.row>
        </x-slot:thead>
        <x-slot:tbody>
            @foreach ($data as $row)
                <x-table.row :red="count($row->errors ?? []) > 0">
                    <x-table.cell :title="$row->last_name" />
                    <x-table.cell :title="$row->first_name" />
                    <x-table.cell :title="$row->middle_name" />
                    <x-table.cell :title="$row->account" />
                    <x-table.cell :title="$row->summ" />
                    <x-table.cell :title="$row->pasp" />
                    <x-table.cell :title="$row->birth" />
                    <x-table.cell :title="$row->kbk" />
                    <x-table.cell :title="$row->snils" />
                    <x-table.cell>
                        <x-list.box>
                            @foreach ($row->errors ?? [] as $error)
                                <x-list.item :title="$error" />
                            @endforeach
                        </x-list.box>
                    </x-table.cell>
                </x-table.row>
            @endforeach
        </x-slot:tbody>
    </x-table.box>
@endsection
