<div class="table-box {{ $attributes['class'] }}">
    @isset($filters)
        <x-table.filters.box :$filters/>
    @endisset
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
    <table @class([$attributes['table-class']])>
        @isset($colgroup)
            {{ $colgroup }}
        @endisset
        @isset($header)
            <x-table.caption :title="$header" />
        @endisset
        @isset($thead)
            {{ $thead }}
        @endisset
        @isset($tbody)
            {{ $tbody }}
        @endisset
    </table>

</div>
