<?php

namespace App\Models\Main;

use App\Models\Glossary\CalendarEventStatus;
use App\Models\Glossary\Payment;
use App\Traits\HasSearch;
use App\Traits\HasSort;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalendarEvent extends Model
{
    ### Трейты
    ##################################################

    use HasFactory, HasSearch, HasSort;

    ### Настройки
    ##################################################
    protected
        $table = 'main__calendar__events',
        $guarded = [];

    public
        $casts = [
            'date' => 'date'
        ],
        $search_columns = ['id', 'status_code', 'date'];

    ### Функции
    ##################################################
    public function scopeOpened()
    {
        return $this->status_code === 'opened';
    }

    ### Связи
    ##################################################
    public function status()
    {
        return $this->belongsTo(CalendarEventStatus::class, 'status_code', 'code');
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class, 'payment_code', 'code');
    }

    public function packages()
    {
        return $this->hasMany(Package::class, 'event_id');
    }

    public function rule()
    {
        return $this->belongsTo(CalendarGeneratorRule::class, 'rule_id');
    }

    public function files(){
        return $this->through('packages')->has('files');
    }
}
