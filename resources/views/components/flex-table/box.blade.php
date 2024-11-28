<div class="flex-table-box">
    <div class="table-box" data-flex="{{ $flex }}">
        <div class="thead">
            @isset($thead)
                {{ $thead }}
            @endisset
        </div>
        <div class="tbody">
            @isset($tbody)
                {{ $tbody }}
            @endisset
        </div>
    </div>
</div>
