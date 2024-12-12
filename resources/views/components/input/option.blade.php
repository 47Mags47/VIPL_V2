@php
    $old_val = old($pName) ?? old(str_replace('.', '_', $pName));
@endphp

<option
    value="{{ $value }}"
    title="{{ $title }}"

    @selected( $old_val === $value or ($old_val === null and isset($select) and $select === $value ) )
>

    {!! mb_strlen($title) > 50 ? mb_substr($title, 0, 50) . '...' : $title !!}

</option>
