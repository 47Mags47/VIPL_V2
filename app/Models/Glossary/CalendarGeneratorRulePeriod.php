<?php

namespace App\Models\Glossary;

use Illuminate\Database\Eloquent\Model;

class CalendarGeneratorRulePeriod extends Model
{
    public
        $timestamps = false,
        $incrementing = false;

    protected
        $table = 'glossary__calendar__generator__rule_periods',
        $primaryKey = 'code',
        $guarded = [];
}
