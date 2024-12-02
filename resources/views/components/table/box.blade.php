<div class="table-box {{ $attributes['class'] }}">
    @isset($filters)
        <x-table.filters.box :$filters/>
    @endisset
    @if (isset($search) || isset($buttons) || isset($optionalButtons))
        <div class="table-options">
            <x-table.search.box :action="$search ?? ''"/>
            <x-buttons.box>
                @isset($buttons)
                    {{ $buttons }}
                @endisset
            </x-buttons.box>
            <div class="table-optional-buttons">
                @isset($optionalButtons)
                    {{ $optionalButtons }}
                @endisset
            </div>
        </div>
    @endif
    <table @class([$attributes['table-class']])>
        @isset($colgroup)
            {{ $colgroup }}
        @endisset
        @isset($header)
            <x-table.caption :title="$header" />
        @endisset
        @isset($thead)
        <thead>
            {{ $thead }}
        </thead>
        @endisset
        @isset($tbody)
        <tbody>
            {{ $tbody }}
        </tbody>
        @endisset
    </table>

</div>
