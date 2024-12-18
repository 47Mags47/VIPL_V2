@extends('layouts.web')
@section('page-name', 'Список подразделений')

@section('back')
    <x-buttons.back :href="route('glossary.index')"/>
@endsection

@section('content')
    <x-table.box :paginator="$events">
        <x-slot:optional-buttons>
            <x-link.blue-button :href="route('glossary.event.create')">
                <x-buttons.ico create />
            </x-link.blue-button>
        </x-slot:optional-buttons>
        <x-slot:thead>
            <x-table.row>
                <x-table.hcell title="Дата" w="100" sort="date" />
                <x-table.hcell title="Описание" />
                <x-table.hcell title="Статус" w="150" sort="status_code" />
                <x-table.hcell ico />
                <x-table.hcell ico />
                <x-table.hcell ico />
            </x-table.row>
        </x-slot:thead>
        <x-slot:tbody>
            @foreach ($events as $event)
                <x-table.row>
                    <x-table.cell :title="$event->date->format('d.m.Y')" center />
                    <x-table.cell :title="$event->description" />
                    <x-table.cell :title="$event->status->name" />
                    <x-table.cell>
                        @if ($event->status_code == 'future')
                            <x-link.blue-button :href="route('glossary.event.open', compact('event'))">
                                <x-buttons.ico eye />
                            </x-link.blue-button>
                        @endif
                        @if ($event->status_code == 'opened')
                            <x-link.red-button :href="route('glossary.event.close', compact('event'))">
                                <x-buttons.ico close />
                            </x-link.red-button>
                        @endif
                    </x-table.cell>
                    <x-table.cell>
                        <x-link.blue-button :href="route('glossary.event.edit', compact('event'))">
                            <x-buttons.ico edit />
                        </x-link.blue-button>
                    </x-table.cell>
                    <x-table.cell>
                        <x-link.red-button :href="route('glossary.event.delete', compact('event'))">
                            <x-buttons.ico delete />
                        </x-link.red-button>
                    </x-table.cell>
                </x-table.row>
            @endforeach
        </x-slot:tbody>
    </x-table.box>
@endsection
