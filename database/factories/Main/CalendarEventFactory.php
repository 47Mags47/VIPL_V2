<?php

namespace Database\Factories\Main;

use App\Models\Glossary\CalendarEventStatus;
use Carbon\CarbonImmutable;
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
        $startOfMount = CarbonImmutable::now()->startOfMonth();
        $endOfMonth = CarbonImmutable::now()->endOfMonth();
        $period = $startOfMount->toPeriod($endOfMonth);

        return [
            'status_code' => CalendarEventStatus::all()->random(1)->first()->code,
            'title' => 'Тестовое событие',
            'date' => collect($period->toArray())->random(1)->first(),
        ];
    }
}
