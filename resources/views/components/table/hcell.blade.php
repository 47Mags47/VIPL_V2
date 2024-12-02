@php
    $width = isset($w) ? $w . 'px' : 'auto';
@endphp
<th
    @class(['has-ico' => isset($ico), $attributes['class']])
    @style(["width:$width" => isset($w)])
>
    <div>
        {{ $title ?? $slot }}
    </div>
</th>
