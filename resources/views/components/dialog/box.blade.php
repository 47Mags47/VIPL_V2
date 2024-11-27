<dialog>
    <div class="close-button-box">

    </div>
    <div class="body">
        @isset($header)
            <h2>{{ $header }}</h2>
        @endisset

        {{ $content }}

        @isset($footer)
            {{ $footer }}
        @endisset
    </div>
</dialog>
