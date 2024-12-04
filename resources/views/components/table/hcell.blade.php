@php
    $width = isset($w) ? $w . 'px' : 'auto';
@endphp
<th
    @class(['has-ico' => isset($ico), $attributes['class']])
    @style(["width:$width" => isset($w)])

    @isset($rowspan)
        rowspan="{{ $rowspan }}"
    @endisset

    @isset($colspan)
        colspan="{{ $colspan }}"
    @endisset
>
    <div>

        @isset($sort)
            <a href="?sort={{ $sort }}&direction={{ url()->getRequest()->direction == 'asc' ? 'desc' : 'asc' }}" class="sort-link">
                {{ $title ?? $slot }}
                @if (url()->getRequest()->sort == $sort)
                    @if (url()->getRequest()->direction == 'asc')
                        <x-buttons.ico sort-asc />
                    @else
                        <x-buttons.ico sort-desc />
                    @endif
                @else
                    <x-buttons.ico has-sort />
                @endif
            </a>
        @else
            {{ $title ?? $slot }}
        @endisset
    </div>
</th>
