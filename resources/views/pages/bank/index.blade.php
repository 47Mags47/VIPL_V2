@extends('layouts.web')
@section('page-name', 'Банки')

@section('content')
    <x-table.box>
        <x-slot:thead>
            <x-table.row>
                <x-table.hcell title="Код" rowspan="2" w=50 />
                <x-table.hcell title="РуКод" rowspan="2" w=150 />
                <x-table.hcell title="Наименование" rowspan="2" />
                <x-table.hcell title="Тип выгрузки" rowspan="2" w=75 />
                <x-table.hcell title="Данные договора" colspan="5" w=800 />
                <x-table.hcell ico rowspan="2" />
            </x-table.row>
            <x-table.row>
                <x-table.hcell title="Номер" />
                <x-table.hcell title="Наименование организации" />
                <x-table.hcell title="ИНН" />
                <x-table.hcell title="Счет организации" />
                <x-table.hcell title="БИК" />
            </x-table.row>
        </x-slot:thead>
        <x-slot:tbody>
            @foreach ($banks as $bank)
                <x-table.row>
                    <x-table.cell :title="$bank->code" center />
                    <x-table.cell :title="$bank->ru_code" />
                    <x-table.cell :title="$bank->name" />
                    <x-table.cell :title="$bank->raport_type_code" center />

                    <x-table.cell :title="$bank->contract->number ?? ''" />
                    <x-table.cell :title="$bank->contract->division_name ?? ''" />
                    <x-table.cell :title="$bank->contract->INN ?? ''" />
                    <x-table.cell :title="$bank->contract->division_account ?? ''" />
                    <x-table.cell :title="$bank->contract->BIK ?? ''" />
                    <x-table.cell>
                        <x-link.blue-button href="">
                            <x-buttons.ico edit/>
                        </x-link.blue-button>
                    </x-table.cell>
                </x-table.row>
            @endforeach
        </x-slot:tbody>
    </x-table.box>
@endsection
