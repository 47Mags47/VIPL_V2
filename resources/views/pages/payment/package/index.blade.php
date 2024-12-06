@extends('layouts.web')
@section('page-name', 'Выплаты')

@section('content')
    <x-table.box>
        <x-slot:optional-button>
            <x-link.blue-button :href="route('raport.payment', compact('event'))">
                <x-buttons.ico>
                    <i class="fa-solid fa-download"></i>
                </x-buttons.ico>
            </x-link.blue-button>
        </x-slot:optional-button>
        <x-slot:thead>
            <x-table.row>
                <x-table.hcell title="UUID" w="300" />
                <x-table.hcell title="Статус" w="75" />
                <x-table.hcell title="Подразделение" />
                <x-table.hcell title="Комментарий" />
                <x-table.hcell title="Файлов" w="75" />
                <x-table.hcell title="Данных" w="75" />
                <x-table.hcell ico />
                <x-table.hcell ico />
            </x-table.row>
        </x-slot:thead>
        <x-slot:tbody>
            @foreach ($packages as $package)
                <x-table.row>
                    <x-table.cell :title="$package->id" />
                    <x-table.cell :title="$package->status->name" center />
                    <x-table.cell :title="$package->division->code . ' - ' . $package->division->name" />
                    <x-table.cell :title="$package->comment" />
                    <x-table.cell :title="$package->files->count()" center />
                    <x-table.cell :title="$package->data->count()" center />
                    <x-table.cell has-button>
                        <x-link.blue-button :href="route('raport.package', compact('package'))">
                            <x-buttons.ico>
                                <i class="fa-solid fa-download"></i>
                            </x-buttons.ico>
                        </x-link.blue-button>
                    </x-table.cell>
                    <x-table.cell has-button>
                        <x-link.blue-button :href="route('payment.file.index', compact('package'))">
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
