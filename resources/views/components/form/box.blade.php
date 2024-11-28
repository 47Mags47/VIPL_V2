<div @class(['form-box', 'center' => isset($center)])>

    <form
        action="{{ $action ?? '' }}"
        method="{{ isset($method) ? (upper($method) === 'GET' ? 'GET' : 'POST') : 'POST' }}"
        enctype = "{{ isset($file) ? 'multipart/form-data' : 'application/x-www-form-urlencoded' }}"
    >

    <div class="errors-box">
        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $message)
                    <li>
                        {{ $message }}
                    </li>
                @endforeach
            </ul>
        @endif
    </div>


        @csrf

        @if (isset($method) and upper($method) !== 'GET')
            @method($method)
        @endif

        @isset($header)
            <h3>{!! $header !!}</h3>
        @endisset

        {{ $slot }}

        @isset($sbm)
            <input type="submit" value="{{ $sbm ?? 'Отправить' }}" class="button blue-button" >
        @endisset
    </form>

</div>
