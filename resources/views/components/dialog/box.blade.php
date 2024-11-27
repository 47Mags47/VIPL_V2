<dialog>
    @isset($header)
        <h3>{{ $header }}</h3>
    @endisset

    {{ $content }}

    @isset($footer)
        {{ $footer }}
    @endisset
</dialog>
