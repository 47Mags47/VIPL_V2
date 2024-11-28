<header>
    <div class="nav-list">
        <nav><x-link.header :href="route('calendar.index')" title="Календарь" /></nav>
        <nav><x-link.header :href="route('calendar.generator.index')" title="Генератор событий" /></nav>
        <nav><x-link.header :href="route('payment.package.index')" title="Пакеты" /></nav>
    </div>
    <div class="user">
        <x-link.header href="" title="Test T.T." />
    </div>
</header>
