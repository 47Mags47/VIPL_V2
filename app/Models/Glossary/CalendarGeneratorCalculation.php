<?php

namespace App\Models\Glossary;

use Illuminate\Database\Eloquent\Model;

class CalendarGeneratorCalculation extends Model
{
    public $timestamps = false;

    protected
        $table = 'glossary__calendar__generator_calculations',
        $primary = 'code';
}
