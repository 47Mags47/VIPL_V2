<div @class(['modal-window', 'open' => isset($open)]) id="{{ $id }}">
    <div class="body">
        <div class="header">
            @isset($header)
                <h3>{{ $header }}</h3>
            @endisset
            <x-buttons.ico><i id="close-button" class="fa-solid fa-x"></i></x-buttons.ico>
        </div>


        {{ $content }}

        @isset($footer)
            {{ $footer }}
        @endisset
    </div>
</div>
