<div class="table-box {{ $attributes['class'] }}">
    @isset($filters)
        <x-table.filters.box :$filters />
    @endisset
    @if (isset($search) || isset($buttons) || isset($optionalButtons) || isset($paginator))
        <div class="table-options">
            <div class="table-search-box">
                @isset($search)
                    <x-table.search.box :$search />
                @endisset
            </div>

            <x-buttons.box>
                @isset($buttons)
                    {{ $buttons }}
                @endisset
            </x-buttons.box>

            <div class="table-optional-buttons">
                @isset($optionalButtons)
                    {{ $optionalButtons }}
                @endisset

                @isset($paginator)
                    @if ($paginator->hasPages())
                        <x-paginate.default :$paginator />
                    @endif
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
            {{ $tbody }}
        @endisset

    </table>

</div>
