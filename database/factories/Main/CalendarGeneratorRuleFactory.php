<?php

namespace Database\Factories\Main;

use App\Models\Glossary\CalendarGeneratorRulePeriod;
use App\Models\Glossary\CalendarGeneratorRuleStatus;
use Carbon\CarbonImmutable;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CalendarGeneratorRuleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'status_code' => CalendarGeneratorRuleStatus::all()->random(1)->first(),
            'date_start' => collect(CarbonImmutable::now()->toPeriod(now()->addMonth())->toArray())->random(1)->first(),
            'period_code' => CalendarGeneratorRulePeriod::all()->random(1)->first()->code,
            'description' => 'Тестовый генератор ' . fake()->firstName(),
            'date_end' => now()->addYear()
        ];
    }
}
