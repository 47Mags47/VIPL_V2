<?php

namespace App\Models\Main;

use App\Models\Glossary\CalendarEventStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalendarEvent extends Model
{
    use HasFactory;

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
    public function status()
    {
        return $this->belongsTo(CalendarEventStatus::class, 'status_code', 'code');
    }

    public function packages(){
        return $this->hasMany(Package::class, 'event_id');
    }
}
