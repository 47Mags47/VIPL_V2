<header>
    <div class="nav-list">
        <nav><x-link.default :href="route('calendar.index')" title="Календарь" /></nav>
        <nav><x-link.default :href="route('calendar.event.index')" title="события" /></nav>
        <nav><x-link.default :href="route('payment.package.index')" title="Пакеты" /></nav>
    </div>
    <div class="user">
        <x-link.default href="" title="Test T.T." />
    </div>
</header>
