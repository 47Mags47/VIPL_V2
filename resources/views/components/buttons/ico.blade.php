<div class='ico-button {{ $attributes['class'] }}'>
    @isset($create)
        <i class="fa-solid fa-plus"></i>
    @endisset

    @isset($edit)
        <i class="fa-regular fa-pen-to-square"></i>
    @endisset

    @isset($delete)
        <i class="fa-solid fa-trash"></i>
    @endisset

    @isset($go)
        <i class="fa-solid fa-up-right-from-square"></i>
    @endisset

    @isset($download)
        <i class="fa-solid fa-download"></i>
    @endisset

    @isset($gear)
        <i class="fa-solid fa-gear"></i>
    @endisset

    @isset($glass)
        <i class="fa-solid fa-magnifying-glass"></i>
    @endisset

    @isset($back)
        <i class="fa-solid fa-left-long"></i>
    @endisset

    @isset($sortAsc)
    <i class="fa-solid fa-arrow-up-wide-short"></i>
    @endisset

    @isset($sortDesc)
    <i class="fa-solid fa-arrow-down-wide-short"></i>
    @endisset

    @isset($hasSort)
    <i class="fa-solid fa-arrows-up-down"></i>
    @endisset

</div>
