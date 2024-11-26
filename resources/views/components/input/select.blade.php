@isset($label)
    <label for="{{ $name }}">
        <span>{{ $label }}</span>
@endisset

<select
    name    ="{{ $name }}"
    id      ="{{ $name }}"

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
