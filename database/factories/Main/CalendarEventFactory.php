<?php

namespace Database\Factories\Main;

use App\Models\Glossary\CalendarEventStatus;
use App\Models\Glossary\Payment;
use App\Models\Main\CalendarGenerator;
use Carbon\CarbonImmutable;
use Carbon\CarbonPeriod;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CalendarEventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'status_code' => CalendarEventStatus::all()->random(1)->first()->code,
            'payment_code' => Payment::all()->random(1)->first()->code,
            'title' => 'Тестовое событие',
            'date' => now(),
        ];
    }
}
