@isset($label)
    <label for="{{ $name ?? '' }}">
        <span class="label-text">{{ $label }}</span>
@endisset

<input
    type                ="{{ $type ?? 'text' }}"

    @isset($name)
        name            ="{{ $name }}"
        id              ="{{ $name }}"
    @endisset

    @if(isset($name) and old($name) !== null or isset($value))
        value           ="{{ old($name) ?? ($value ?? '') }}"
    @endisset

    @isset($ph)
        placeholder     ="{{ $ph }}"
    @endisset

    @isset($autocomplete)
        autocomplete    ="{{ $autocomplete }}"
    @endisset

    @isset($form)
        form            ="{{ $form }}"
    @endisset

    @required(isset($req))
    @disabled(isset($disabled))
>

@isset($label)
    </label>
@endisset