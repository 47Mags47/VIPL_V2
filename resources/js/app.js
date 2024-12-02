import Echo from 'laravel-echo';
import './bootstrap';

import './components/dialog.js'
import './components/flex-table.js'

window.Echo.channel('calendar-event').listen('CalendarEventStore', (e) => {
    console.log(e);
})
