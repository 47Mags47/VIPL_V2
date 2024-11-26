<div class="form-box">

    <form
        action="{{ $action ?? '' }}"
        method="{{ isset($method) ? (upper($method) === 'GET' ? 'GET' : 'POST') : 'POST' }}"
    >

        @if (isset($method) and upper($method) !== 'GET')
            @method($method)
        @endif

        @isset($header)
            <p class="box-header">{!! $header !!}</p>
        @endisset

        {{ $slot }}

        @isset($sbm)
            <input type="submit" value="{{ $sbm ?? 'Отправить' }}" class="button blue-button" >
        @endisset
    </form>

</div>
