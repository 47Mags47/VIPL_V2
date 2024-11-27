<x-table.box w100 header="Декабрь 2025">
    <x-slot:buttons>
        <x-link.blue-button href="" title="Прошлый" />
        <x-link.blue-button href="" title="текущий" />
        <x-link.blue-button href="" title="Следующий" />
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
        @foreach ($weeks as $week)
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
