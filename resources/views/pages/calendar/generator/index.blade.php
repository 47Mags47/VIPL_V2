@extends('layouts.web')
@section('page-name', 'Генератор событий')

@section('content')
    {!! $create_dialog !!}

    <x-flex-table.box flex="1 150px 125px 125px 100px 40px 40px">
        <x-slot:optional-button>
            <x-buttons.ico class="blue-button">
                <x-buttons.dialog-open class="blue-button" dialog="create-generator-dialog">
                    <i class="fa-solid fa-plus"></i>
                </x-buttons.dialog-open>
            </x-buttons.ico>
        </x-slot:optional-button>
        <x-slot:thead>
            <x-flex-table.rox>
                <x-flex-table.cell title="Текст" />
                <x-flex-table.cell title="Период" />
                <x-flex-table.cell title="Дата начала" />
                <x-flex-table.cell title="Дата окончания" />
                <x-flex-table.cell title="Статус" />
                <x-flex-table.cell has-button />
                <x-flex-table.cell has-button />
            </x-flex-table.rox>
        </x-slot:thead>
        <x-slot:tbody>
            @foreach ($rules as $rule)
                <x-flex-table.rox>
                    <x-flex-table.cell :title="$rule->title" />
                    <x-flex-table.cell :title="$rule->calculation->name" />
                    <x-flex-table.cell :title="$rule->date_start->format('d.m.Y')" center />
                    <x-flex-table.cell :title="$rule->date_end->format('d.m.Y')" center />
                    <x-flex-table.cell :title="$rule->status->name" />
                    <x-flex-table.cell has-button>
                        <x-link.blue-button href="">
                            <x-buttons.ico>
                                <i class="fa-regular fa-pen-to-square"></i>
                            </x-buttons.ico>
                        </x-link.blue-button>
                    </x-flex-table.cell>
                    <x-flex-table.cell has-button>
                        <x-link.red-button href="">
                            <x-buttons.ico>
                                <i class="fa-solid fa-trash"></i>
                            </x-buttons.ico>
                        </x-link.red-button>
                    </x-flex-table.cell>
                </x-flex-table.rox>
            @endforeach
        </x-slot:tbody>
    </x-flex-table.box>
@endsection
