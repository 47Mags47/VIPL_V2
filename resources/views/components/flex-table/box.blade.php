<div class="flex-table-box">
    @if (isset($search) or isset($buttons) or isset($optionalButton))
        <div class="table-options">
            <x-table.search.box :action="$search ?? ''"/>
            <x-buttons.box>
                @isset($buttons)
                    {{ $buttons }}
                @endisset
            </x-buttons.box>
            <div class="table-optional-buttons">
                @isset($optionalButton)
                    {{ $optionalButton }}
                @endisset
            </div>
        </div>
    @endif
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

        @isset($tbody)
            <div class="tbody">
                {{ $tbody }}
            </div>
        @endisset

        @isset($liveBody)
            {{ $liveBody }}
        @endisset
    </div>
</div>
