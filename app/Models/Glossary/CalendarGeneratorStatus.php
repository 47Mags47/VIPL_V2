<?php

namespace App\Models\Glossary;

use Illuminate\Database\Eloquent\Model;

class CalendarGeneratorStatus extends Model
{
    public $timestamps = false;

    protected
        $table = 'glossary__calendar__generator_statuses',
        $primary = 'code';
}
