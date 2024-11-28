<a href="{{ $href }}">
    @isset($title)
        <x-buttons.blue class="{{ $attributes['class'] }}" :$title />
    @else
        <x-buttons.blue class="{{ $attributes['class'] }}">
            {{ $slot }}
        </x-buttons.blue>
    @endisset
</a>
