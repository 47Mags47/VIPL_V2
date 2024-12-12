<?php

namespace App\Models\Main;

use App\Models\Glossary\CalendarGeneratorRulePeriod;
use App\Models\Glossary\CalendarGeneratorRuleStatus;
use App\Models\Glossary\Payment;
use App\Traits\HasSearch;
use App\Traits\HasSort;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CalendarGeneratorRule extends Model
{
    use SoftDeletes, HasFactory, HasSearch, HasSort;

    ### Настройки
    ##################################################
    protected
        $table = 'main__calendar__generator__rules',
        $guarded = [];

    public
        $timestamps = false,
        $casts = [
            'date_start' => 'date',
            'date_end' => 'date'
        ],
        $search_columns = ['description'];

    ### Функции
    ##################################################
    public function scopeAfterEvents()
    {
        return $this->hasMany(CalendarEvent::class, 'rule_id')->where('date', '>', now())->get();
    }

    public function ScopeSetStatus(Builder $builder, string $status)
    {
        $this->update(['status_code' => $status]);
    }

    ### Связи
    ##################################################
    public function status()
    {
        return $this->belongsTo(CalendarGeneratorRuleStatus::class, 'status_code', 'code');
    }

    public function period()
    {
        return $this->belongsTo(CalendarGeneratorRulePeriod::class, 'period_code', 'code');
    }

    public function events()
    {
        return $this->hasMany(CalendarEvent::class, 'rule_id');
    }

    public function payment(){
        return $this->belongsTo(Payment::class, 'payment_code');
    }
}
