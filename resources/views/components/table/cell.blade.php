<td
    @class([
        'center' => isset($center),
        'right' => isset($right),
        'bold' => isset($right),
        $attributes['class'],
    ])

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
</td>
