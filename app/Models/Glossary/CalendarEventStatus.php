<?php

namespace App\Models\Glossary;

use Illuminate\Database\Eloquent\Model;

class CalendarEventStatus extends Model
{
    public $timestamps = false;

    protected
        $table = 'glossary__calendar__event_statuses',
        $primary = 'code';
}
