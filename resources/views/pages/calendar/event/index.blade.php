@extends('layouts.web')
@section('page-name', 'События')

@section('content')
    <x-table.box>
        <x-slot:buttons>
            <x-link.blue-button :href="route('calendar.event.create')" title="Добавить" />
        </x-slot:buttons>
        <x-slot:thead>
            <x-table.row>
                <x-table.hcell title="Статус" />
                <x-table.hcell title="Наименование" />
                <x-table.hcell title="Генератор" />
                <x-table.hcell title="Дата" />
            </x-table.row>
            <x-slot:tbody>
                @foreach ($events as $event)
                    <x-table.row>
                        <x-table.cell :title="$event->status->name" />
                        <x-table.cell :title="$event->title" />
                        <x-table.cell>
                            @php
                                $generator = $event->generator;
                                $date_start = $generator->date_start;
                                $date_end = $generator->date_end;
                            @endphp
                            <span>
                                {{ $generator->calculation->name }}
                                <x-link.default href="">
                                    (c {{ $date_start->format('d.m.Y') }} по {{ $date_end->format('d.m.Y') }})
                                </x-link.default>
                            </span>
                            <x-dialog.box>
                                <x-slot:header>Заголовок</x-slot:header>
                                <x-slot:content>
                                    <x-text.info label="Дата начала" :value="$generator->date_start" />
                                    <x-text.info label="Дата окончания" :value="$generator->date_end" />
                                    <x-text.info label="Переод" :value="$generator->calculation->name" />
                                    <x-text.info label="Описание" :value="$generator->title" />
                                    <x-text.info label="Статус" :value="$generator->date_start" />
                                    <x-text.info label="Дата" :value="$generator->status->name" />
                                </x-slot:content>
                                <x-slot:footer>
                                    <x-link.blue-button href="" title="test" />
                                </x-slot:footer>
                            </x-dialog.box>
                        </x-table.cell>
                        <x-table.cell :title="$event->date->format('d.m.Y')" />
                    </x-table.row>
                @endforeach
            </x-slot:tbody>
        </x-slot:thead>
    </x-table.box>
@endsection
