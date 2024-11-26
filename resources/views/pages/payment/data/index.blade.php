@extends('layouts.web')
@section('page-name', 'Выплаты')

@section('content')
    <x-table.box>
        <x-slot:thead>
            <x-table.row>
                <x-table.hcell title="Фамилия" />
                <x-table.hcell title="Имя" />
                <x-table.hcell title="Отчество" />
                <x-table.hcell title="Счёт" />
                <x-table.hcell title="Сумма" />
                <x-table.hcell title="Пасп" />
                <x-table.hcell title="ДР" />
                <x-table.hcell title="КБК" />
                <x-table.hcell title="СНИЛС" />
                <x-table.hcell title="Ошибки" />
            </x-table.row>
        </x-slot:thead>
        <x-slot:tbody>
            @foreach ($data as $row)
                <x-table.row>
                    <x-table.cell :title="$row->last_name" />
                    <x-table.cell :title="$row->first_name" />
                    <x-table.cell :title="$row->middle_name" />
                    <x-table.cell :title="$row->account" />
                    <x-table.cell :title="$row->summ" />
                    <x-table.cell :title="$row->pasp" />
                    <x-table.cell :title="$row->birth->format('d.m.Y')" />
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
