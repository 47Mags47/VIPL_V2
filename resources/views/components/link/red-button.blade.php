<a href="{{ $href }}">
    @isset($title)
        <x-buttons.red class="{{ $attributes['class'] }}" :$title />
    @else
        <x-buttons.red class="{{ $attributes['class'] }}">
            {{ $slot }}
        </x-buttons.red>
    @endisset
</a>
