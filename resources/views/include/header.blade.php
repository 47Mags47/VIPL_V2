<header>
    <div class="nav-list">
        <nav><x-link.header :href="route('calendar.index')" title="Календарь" /></nav>
        <nav><x-link.header :href="route('raport.index')" title="Отчеты" /></nav>
        <nav><x-link.header :href="route('glossary.index')" title="Справочники" /></nav>
    </div>
    <div class="user">
        <x-link.header href="" title="Test T.T." />
    </div>

    @if (session('sys_message'))
        <div class="sys-message-box">
            @if (is_array(session('sys_message')))
                <x-list.box>
                    @foreach (session('sys_message') as $item)
                        <x-list.item>{{ $item }}</x-list.item>
                    @endforeach
                </x-list.box>
            @else
                <x-list.box>
                    <x-list.item>{{ session('sys_message') }}</x-list.item>
                </x-list.box>
            @endif
        </div>
    @endif
</header>
