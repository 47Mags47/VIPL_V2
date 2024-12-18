<tr
    @class([
        'red' => isset($red) and $red == true,
        $attributes['class']
    ])
>
    {{ $slot }}
</tr>
