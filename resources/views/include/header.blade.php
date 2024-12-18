<header>
    <div class="nav-list">
        @yield('back')
        <nav><x-link.header :href="route('calendar.index')" title="Календарь" /></nav>
        @if (auth()->user()->isAdministration())
            <nav><x-link.header :href="route('raport.index')" title="Отчеты" /></nav>
            <nav><x-link.header :href="route('glossary.index')" title="Справочники" /></nav>
        @endif
    </div>
    <div class="user">
        <x-link.header :href="route('logout')" title="Test T.T." />
    </div>

    <div class="sys-alert-box">
        @if (session('sys_message') !== null or session('sys_error') !== null)
            <x-list.box>
                @if (session('sys_message') !== null)
                    @if (is_array(session('sys_message')))
                        @foreach (session('sys_message') as $message)
                            <x-list.item class="message">{{ $message }}</x-list.item>
                        @endforeach
                    @else
                        <x-list.item class="message">{{ session('sys_message') }}</x-list.item>
                    @endif
                @endif
                @if (session('sys_error') !== null)
                    @if (is_array(session('sys_error')))
                        @foreach (session('sys_error') as $error)
                            <x-list.item class="error">{{ $error }}</x-list.item>
                        @endforeach
                    @else
                        <x-list.item class="error">{{ session('sys_error') }}</x-list.item>
                    @endif
                @endif
            </x-list.box>
        @endif
    </div>
</header>
