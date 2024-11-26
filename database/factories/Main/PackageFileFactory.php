<?php

namespace Database\Factories\Main;

use App\Models\Glossary\PackageFileStatus;
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
            'id' => Str::uuid(),
            'path' => 'test/data/file/path.test',
            'status_code' => PackageFileStatus::all()->random(1)->first()->code,
            'package_id' => Package::all()->random(1)->first()->first(),
        ];
    }
}
