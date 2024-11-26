<option
    value="{{ $value }}"
    title="{!! (mb_strlen($title) > 70 or isset($title)) ? $title : '' !!}"

    @selected((isset($pName) and old($pName) == $value) or (isset($select) and $select == $value))
>

    {!! mb_strlen($title) > 70 ? mb_substr($title, 0, 70) . '...' : $title !!}

</option>
