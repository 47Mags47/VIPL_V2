<div class="flex-table-box">
    <div class="table-options">
        <x-table.search.box :action="$search ?? ''"/>
        <x-buttons.box>
            @isset($buttons)
                {{ $buttons }}
            @endisset
        </x-buttons.box>
        <div class="table-optional-button">
            @isset($optionalButton)
                {{ $optionalButton }}
            @endisset
        </div>
    </div>
    <div
        class="table-box"
        @isset($flex)
            data-flex="{{ $flex }}"
        @endisset
    >
        <div class="thead">
            @isset($thead)
                {{ $thead }}
            @endisset
        </div>
        <div class="tbody">
            @isset($tbody)
                {{ $tbody }}
            @endisset
        </div>
    </div>
</div>
