@extends('layouts.web')
@section('page-name', 'Календарь')

@section('content')
    <x-table.box :header="mb_ucfirst($calendar->month->translatedFormat('F Y'))" table-class="calendar">
        <x-slot:buttons>
            <x-link.blue-button :href="route('calendar.index', [
                'year' => $calendar->lastMonth()->format('Y'),
                $calendar->lastMonth()->format('m'),
            ])">
                <i class="fa-solid fa-chevron-left"></i><i class="fa-solid fa-chevron-left"></i>
            </x-link.blue-button>
            <x-link.blue-button :href="route('calendar.index')" title="МЕСЯЦ" />
            <x-link.blue-button :href="route('calendar.index', [
                'year' => $calendar->nextMonth()->format('Y'),
                $calendar->nextMonth()->format('m'),
            ])">
                <i class="fa-solid fa-chevron-right"></i><i class="fa-solid fa-chevron-right"></i>
            </x-link.blue-button>
        </x-slot:buttons>
        <x-slot:thead>
            <x-table.row>
                <x-table.hcell title="ПН" />
                <x-table.hcell title="ВТ" />
                <x-table.hcell title="СР" />
                <x-table.hcell title="ЧТ" />
                <x-table.hcell title="ПТ" />
                <x-table.hcell title="СБ" class="red-color" w="100" />
                <x-table.hcell title="ВС" class="red-color" w="100" />
            </x-table.row>
        </x-slot:thead>
        <x-slot:tbody>
            @foreach ($calendar->getPeriodEvents() as $week)
                <x-table.row>
                    @foreach ($week as $day)
                        <x-table.cell @class([
                            'now' => $day['day']->format('d.m.Y') === now()->format('d.m.Y'),
                            'not-this-month' => !$day['thisMounth'],
                        ])>
                            <span class="date">{{ $day['day']->format('d') }}</span>
                            <x-list.box>
                                @foreach ($day['events'] as $event)
                                    <x-list.item>
                                        @if ($event->status_code === 'opened' or $event->status_code === 'closed' or auth()->user()->isAdministration())
                                            <x-link.default class="{{ $event->status_code }}" :href="route('calendar.event.show', compact('event'))"
                                                :title="$event->description" />
                                        @else
                                            <span>{{ $event->description }}</span>
                                        @endif
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
