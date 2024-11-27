<?php

namespace Database\Factories\Main;

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
            'date_start' => now(),
            'calculation_code' => 'monthly',
            'title' => 'Тестовый генератор',
            'date_end' => now()->addYear()
        ];
    }
}
