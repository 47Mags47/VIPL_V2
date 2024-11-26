@isset($label)
    <label for="{{ $name }}">
        <span>{{ $label }}</span>
@endisset

    <textarea
        name    ="{{ $name }}"
        id      ="{{ $name }}"

        @isset($cols)
            cols    ="{{ $cols }}"
        @endisset

        @isset($rows)
            rows    ="{{ $rows }}"
        @endisset

        @isset($ph)
            placeholder="{{ $ph }}"
        @endisset

        @isset($form)
            form="{{ $form }}"
        @endisset

        @disabled(isset($disabled))
    >{{ old($name) ?? ($value ?? null) }}</textarea>

@isset($label)
    </label>
@endisset
