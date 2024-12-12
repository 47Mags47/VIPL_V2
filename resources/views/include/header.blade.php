<header>
    <div class="nav-list">
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
        @if (session('message') !== null or $errors->any())
            <x-list.box>
                @if (session('message') !== null)
                    @if (is_array(session('message')))
                        @foreach (session('message') as $message)
                            <x-list.item class="message">{{ $message }}</x-list.item>
                        @endforeach
                    @else
                        <x-list.item class="message">{{ session('message') }}</x-list.item>
                    @endif
                @endif
                @if (session('error') !== null)
                    @if (is_array(session('error')))
                        @foreach (session('error') as $error)
                            <x-list.item class="error">{{ $error }}</x-list.item>
                        @endforeach
                    @else
                        <x-list.item class="error">{{ session('error') }}</x-list.item>
                    @endif
                @endif
            </x-list.box>
        @endif
    </div>
</header>
