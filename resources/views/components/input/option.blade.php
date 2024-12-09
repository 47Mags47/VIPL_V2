{{-- @dd(mb_strlen($title)) --}}
<option
    value="{{ $value }}"
    title="{{ $title }}"

    @selected((isset($pName) and old(str_replace('.', '_', $pName)) == $value) or (isset($select) and $select == $value))
>

    {!! mb_strlen($title) > 50 ? mb_substr($title, 0, 50) . '...' : $title !!}

</option>
