@extends('layouts.web')
@section('page-name', 'Календарь')

@section('content')
    <x-table.box w100 header="Декабрь 2025">
        <x-slot:buttons>
            <x-link.blue-button :href="route('calendar.index', ['year' => $calendar->lastMonth()->format('Y'), $calendar->lastMonth()->format('m')])" title="Прошлый" />
            <x-link.blue-button :href="route('calendar.index')" title="текущий" />
            <x-link.blue-button :href="route('calendar.index', ['year' => $calendar->nextMonth()->format('Y'), $calendar->nextMonth()->format('m')])" title="Следующий" />
        </x-slot:buttons>
        <x-slot:thead>
            <tr>
                <x-table.hcell title="ПН" />
                <x-table.hcell title="ВТ" />
                <x-table.hcell title="СР" />
                <x-table.hcell title="ЧТ" />
                <x-table.hcell title="ПТ" />
                <x-table.hcell title="СБ" />
                <x-table.hcell title="ВС" />
            </tr>
        </x-slot:thead>
        <x-slot:tbody>
            @foreach ($calendar->getPeriodEvents() as $week)
                <x-table.row>
                    @foreach ($week as $day)
                        <x-table.cell>
                            <span>{{ $day['day']->format('d') }}</span>
                            <x-list.box>
                                @foreach ($day['events'] as $event)
                                    <x-list.item>
                                        <x-link.default href="" :title="$event->title . ' (' . $event->status->name . ')'" />
                                    </x-list.item>
                                @endforeach
                            </x-list.box>
                        </x-table.cell>
                    @endforeach
                </x-table.row>
            @endforeach
        </x-slot:tbody>
    </x-table.box>
@endsection
