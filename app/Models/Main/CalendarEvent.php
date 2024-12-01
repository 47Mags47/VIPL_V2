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
    protected $table = 'main__calendar__events';

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

    public function scopeBankFiles($query, string $bank){
        return $this->through('packages')->has('files')->where('bank_code', $bank)->get();
    }

    ### Связи
    ##################################################
    public function status()
    {
        return $this->belongsTo(CalendarEventStatus::class, 'status_code', 'code');
    }

    public function generator()
    {
        return $this->belongsTo(CalendarGenerator::class, 'generator_id');
    }

    public function packages(){
        return $this->hasMany(Package::class, 'event_id');
    }

}
