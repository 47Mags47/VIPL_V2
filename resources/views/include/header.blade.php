<header>
    <div class="nav-list">
        <nav><x-link.header :href="route('calendar.index')" title="Календарь" /></nav>
        <nav><x-link.header :href="route('raport.index')" title="Отчеты" /></nav>
        <nav><x-link.header :href="route('bank.index')" title="Банки" /></nav>
    </div>
    <div class="user">
        <x-link.header href="" title="Test T.T." />
    </div>
</header>
