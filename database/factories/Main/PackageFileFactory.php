<?php

namespace Database\Factories\Main;

use App\Models\Main\Package;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PackageFileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'uuid' => Str::uuid(),
            'path' => 'test/data/file/path.test',
            'package_uuid' => Package::all()->random(1)->first()->first(),
        ];
    }
}
