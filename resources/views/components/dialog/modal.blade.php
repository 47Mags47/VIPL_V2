<div @class(['modal-window', 'open' => isset($open)]) id="{{ $id }}">
    <div class="body">
        <div class="header">
            @isset($header)
                <h3>{{ $header }}</h3>
            @endisset
            <i id="close-button" class="fa-solid fa-xmark"></i>
        </div>


        {{ $content }}

        @isset($footer)
            {{ $footer }}
        @endisset
    </div>
</div>
