<?php

namespace App\Models\Main;

use App\Models\Glossary\CalendarEventStatus;
use App\Traits\HasSearch;
use App\Traits\HasSort;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalendarEvent extends Model
{
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
    public function ScopeOpened()
    {
        return $this->status_code === 'opened';
    }

    public function scopeBankFiles($query, string $bank)
    {
        return $this->through('packages')->has('files')->where('bank_code', $bank)->get();
    }

    ### Связи
    ##################################################
    public function status()
    {
        return $this->belongsTo(CalendarEventStatus::class, 'status_code', 'code');
    }

    public function packages()
    {
        return $this->hasMany(Package::class, 'event_id');
    }
}
