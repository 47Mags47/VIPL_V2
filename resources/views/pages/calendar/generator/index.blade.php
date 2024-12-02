@extends('layouts.web')
@section('page-name', 'Генератор событий')

@section('content')
    {!! $create_dialog !!}

    <x-table.box>
        <x-slot:optional-buttons>
            <x-buttons.ico class="blue-button">
                <x-buttons.dialog-open class="blue-button" dialog="create-generator-dialog">
                    <i class="fa-solid fa-plus"></i>
                </x-buttons.dialog-open>
            </x-buttons.ico>
        </x-slot:optional-buttons>
        <x-slot:thead>
            <x-table.row>
                <x-table.hcell title="Текст" />
                <x-table.hcell title="Период" w=300 />
                <x-table.hcell title="Дата начала" w=150 />
                <x-table.hcell title="Дата окончания" w=150 />
                <x-table.hcell title="Статус" w=150 />
                <x-table.hcell ico />
                <x-table.hcell ico />
            </x-table.row>
        </x-slot:thead>
        <x-slot:tbody>
            @foreach ($rules as $rule)
                <x-table.row>
                    <x-table.cell :title="$rule->title" />
                    <x-table.cell :title="$rule->calculation->name" />
                    <x-table.cell :title="$rule->date_start->format('d.m.Y')" center />
                    <x-table.cell :title="$rule->date_end->format('d.m.Y')" center />
                    <x-table.cell :title="$rule->status->name" />
                    <x-table.cell>
                        <x-link.blue-button href="">
                            <x-buttons.ico>
                                <i class="fa-regular fa-pen-to-square"></i>
                            </x-buttons.ico>
                        </x-link.blue-button>
                    </x-table.cell>
                    <x-table.cell>
                        <x-link.red-button href="">
                            <x-buttons.ico>
                                <i class="fa-solid fa-trash"></i>
                            </x-buttons.ico>
                        </x-link.red-button>
                    </x-table.cell>
                </x-table.row>
            @endforeach
        </x-slot:tbody>
    </x-table.box>
@endsection
