<td @class(['center' => isset($center), $attributes['class']])>
    <div>
        {{ $title ?? $slot }}
    </div>
</td>
