@php
    $old_name = str_replace('.', '_', $name);

    $old_name = str_replace('[', '.', $old_name);
    $old_name = str_replace(']', '', $old_name);
@endphp

@isset($label)
    <label for="{{ $name }}">
        <span>{{ $label }}</span>
@endisset

<select
    name    ="{{ $name }}"
    id      ="{{ $name }}"

    @class(['error' => count($errors->get($old_name)) > 0 ])

    @isset($form)
        form="{{ $form }}"
    @endisset

    @disabled(isset($disabled))
>

    <option value="">--- Не выбрано ---</option>
    {{ $slot }}

</select>

@isset($label)
    </label>
@endisset
