<?php

namespace App\Models\Main;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CalendarGenerator extends Model
{
    use SoftDeletes;

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

}
