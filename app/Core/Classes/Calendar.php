<?php

namespace App\Core\Classes;

use App\Models\Main\CalendarEvent;
use Carbon\CarbonImmutable;

class Calendar
{
    public
        $startOfPeriod,
        $endOfPeriod,
        $period;
    private
        $month;

    public function __construct(int $year, int $month)
    {
        $this->month = CarbonImmutable::create($year, $month, 1);
        $monthEnd = $this->month->endOfMonth();

        $this->startOfPeriod = $this->month->startOfWeek();
        $this->endOfPeriod = $monthEnd->endOfWeek();

        $this->period = $this->startOfPeriod->toPeriod($this->endOfPeriod);
    }

    public function getPeriodEvents(){
        return collect($this->period->toArray())->map(fn($day)=> [
            'day'=> $day,
            'events' => CalendarEvent::where('date', $day)->get()
        ])->chunk(7);
    }

    public function nextMonth(){
        return $this->month->addMonth(1);
    }

    public function lastMonth(){
        return $this->month->addMonth(-1);
    }
}
