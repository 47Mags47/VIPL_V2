<x-page>
    <x-slot:page-name>
        {{ env('APP_NAME') }}
        @hasSection('page-name')
            - @yield('page-name')
        @endif
    </x-slot:page-name>

    <x-slot:content>
        <x-header.box />
        @yield('content')
    </x-slot:content>
</x-page>
