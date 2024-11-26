<?php

namespace Database\Factories\Main;

use App\Models\Main\PackageFile;
use Carbon\CarbonImmutable;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PackageDataFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'file_id' => PackageFile::all()->random(1)->first(),
            'first_name' => fake()->firstName(),
            'middle_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'account' => '4081781040000380' . rand(1000, 9999),
            'summ' => rand(100, 9999) . '.' . rand(0, 99),
            'pasp' => rand(100000, 999999),
            'birth' => collect(CarbonImmutable::create(1980)->toPeriod(now())->toArray())->random(1)->first(),
            'kbk' => null,
            'snils' => rand(100, 999) . '-' . rand(100, 999) . '-' . rand(100, 999) . ' ' . rand(10, 99),
        ];
    }
}
