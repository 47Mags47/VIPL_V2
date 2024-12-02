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
        {{ $title ?? $slot }}
    </div>
</th>
