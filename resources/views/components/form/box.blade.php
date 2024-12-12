<div @class(['form-box', 'center' => isset($center), $attributes['class']])>

    <form
        action="{{ $action ?? '' }}"
        method="{{ isset($method) ? (strtoupper($method) === 'GET' ? 'GET' : 'POST') : 'POST' }}"
        enctype = "{{ isset($file) ? 'multipart/form-data' : 'application/x-www-form-urlencoded' }}"
    >

        @if ($errors->any())
            <x-list.box class="errors-box">
                @foreach ($errors->all() as $message)
                    <x-list.item>{{ $message }}</x-list.item>
                @endforeach
            </x-list.box>
        @endif


        @csrf

        @if (isset($method) and strtoupper($method) !== 'GET')
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
