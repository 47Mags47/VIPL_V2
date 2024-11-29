<x-buttons.default
    @class([
        'dialog-open-button',
        $attributes['class']
    ])
    data-dialog="{{ $dialog }}"
>
    {{ $title ?? $slot }}
</x-buttons.default>
