<div class="flex-table-row"
    @isset($key)
        wire:key="{{ $key }}"
    @endisset
>
    {{ $slot }}
</div>
