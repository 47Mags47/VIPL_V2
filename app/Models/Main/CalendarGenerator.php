<?php

namespace App\Models\Main;

use App\Models\Glossary\CalendarGeneratorCalculation;
use App\Models\Glossary\CalendarGeneratorStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CalendarGenerator extends Model
{
    use SoftDeletes, HasFactory;

    ### Настройки
    ##################################################
    protected $table = 'main__calendar__generators';

    public
        $timestamps = false,
        $casts = [
            'date_start' => 'date',
            'date_end' => 'date'
        ];

    ### Функции
    ##################################################

    ### Связи
    ##################################################
    public function status()
    {
        return $this->belongsTo(CalendarGeneratorStatus::class, 'status_code', 'code');
    }

    public function calculation()
    {
        return $this->belongsTo(CalendarGeneratorCalculation::class, 'calculation_code', 'code');
    }

}
