<?php

namespace App\Models\Main;

use App\Models\Glossary\CalendarEventStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class CalendarEvent extends Model
{
    ### Настройки
    ##################################################
    protected $table = 'main__calendar_events';

    public
        $timestamps = false,
        $casts = [
            'date' => 'date'
        ];

    ### Функции
    ##################################################
    public function ScopeOpened(){
        return $this->status_code === 'opened';
    }

    ### Связи
    ##################################################
    public function status(): HasOne
    {
        return $this->hasOne(CalendarEventStatus::class, 'code', 'status_code');
    }
}
