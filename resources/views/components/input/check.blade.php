@isset($label)
    <label for="{{ $name ?? '' }}" class="checkbox-label">
@endisset



<input
    type="checkbox"
    value="1"

    @isset($name)
        name            ="{{ $name }}"
        id              ="{{ $name }}"
    @endisset

    @isset($form)
        form            ="{{ $form }}"
    @endisset

    @isset($checked)
        @checked($checked)
    @endisset

    @disabled(isset($disabled))
>

@isset($label)
        <span class="label-text">{{ $label }}</span>
    </label>
@endisset
