<div @class([
    'cell',
    'center' => isset($center),
    'has-button' => isset($hasButton),
])>
    <div>
        {{ $title ?? $slot }}
    </div>
</div>
