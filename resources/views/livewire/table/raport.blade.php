<div class="tbody">
    @foreach ($raports as $raport)
        <x-flex-table.row key="{{ $raport->id }}">
            <x-flex-table.cell :title="$raport->name" />
            <x-flex-table.cell :title="$raport->created_at->format('d.m.Y H:i:s')" />
            <x-flex-table.cell >
                <x-link.blue-button :href="route('raport.download', compact('raport'))">
                    <x-buttons.ico>
                        <i class="fa-solid fa-download"></i>
                    </x-buttons.ico>
                </x-link.blue-button>
            </x-flex-table.cell >
        </x-flex-table.row>
    @endforeach
</div>
