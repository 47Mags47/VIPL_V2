@extends('layouts.web')
@section('page-name', 'Список выплат')

@section('content')
    <x-table.box :paginator="$banks" :$search>
        <x-slot:optional-buttons>
            <x-link.blue-button :href="route('glossary.bank.create')">
                <x-buttons.ico create />
            </x-link.blue-button>
        </x-slot:optional-buttons>
        <x-slot:thead>
            <x-table.row>
                <x-table.hcell title="Код" rowspan="2" w="50" />
                <x-table.hcell title="Ру Код" rowspan="2" w="150" />
                <x-table.hcell title="Наименование" rowspan="2" w="350" />
                <x-table.hcell title="Данные договора" colspan="5" />
                <x-table.hcell ico rowspan=2 />
                <x-table.hcell ico rowspan=2 />
            </x-table.row>
            <x-table.row>
                <x-table.hcell title="Номер"/>
                <x-table.hcell title="Подразделение" />
                <x-table.hcell title="ИНН" />
                <x-table.hcell title="Счёт" />
                <x-table.hcell title="БИК" />
            </x-table.row>
        </x-slot:thead>
        <x-slot:tbody>
            @foreach ($banks as $bank)
                <x-table.row>
                    <x-table.cell :title="$bank->code" center />
                    <x-table.cell :title="$bank->ru_code" />
                    <x-table.cell :title="$bank->name" />

                    <x-table.cell :title="$bank->contract->number ?? ''" />
                    <x-table.cell :title="$bank->contract->division_name ?? ''" />
                    <x-table.cell :title="$bank->contract->INN ?? ''" />
                    <x-table.cell :title="$bank->contract->division_account ?? ''" />
                    <x-table.cell :title="$bank->contract->BIK ?? ''" />
                    <x-table.cell>
                        <x-link.blue-button :href="route('glossary.bank.edit', compact('bank'))">
                            <x-buttons.ico edit/>
                        </x-link.blue-button>
                    </x-table.cell>
                    <x-table.cell>
                        <x-link.red-button :href="route('glossary.bank.delete', compact('bank'))">
                            <x-buttons.ico delete/>
                        </x-link.red-button>
                    </x-table.cell>
                </x-table.row>
            @endforeach
        </x-slot:tbody>
    </x-table.box>
@endsection
