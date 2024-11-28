<?php

namespace Database\Factories\Main;

use App\Models\Glossary\CalendarGeneratorCalculation;
use App\Models\Glossary\CalendarGeneratorStatus;
use Carbon\CarbonImmutable;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CalendarGeneratorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'status_code' => CalendarGeneratorStatus::all()->random(1)->first(),
            'date_start' => collect(CarbonImmutable::now()->toPeriod(now()->addMonth())->toArray())->random(1)->first(),
            'calculation_code' => CalendarGeneratorCalculation::all()->random(1)->first()->code,
            'title' => 'Тестовый генератор ' . fake()->firstName(),
            'date_end' => now()->addYear()
        ];
    }
}
