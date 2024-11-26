<?php

namespace App\Core\Classes;

use App\Models\Main\CalendarEvent;
use Carbon\CarbonImmutable;

class Calendar
{
    public $startOfPeriod, $endOfPeriod, $period;
    protected $month;

    public function __construct(int $year = null, int $month = null)
    {
        $monthStart = CarbonImmutable::create($year ?? now()->format('Y'), $month ?? now()->format('m'), 1);
        $monthEnd = $monthStart->endOfMonth();

        $this->startOfPeriod = $monthStart->startOfWeek();
        $this->endOfPeriod = $monthEnd->endOfWeek();

        $this->period = $this->startOfPeriod->toPeriod($this->endOfPeriod);
    }

    public function getPeriodEvents(){
        return collect($this->period->toArray())->map(fn($day)=> [
            'day'=> $day,
            'events' => CalendarEvent::whereBetween('date', [$this->startOfPeriod, $this->endOfPeriod])->get()
        ])->chunk(7);
    }
}
