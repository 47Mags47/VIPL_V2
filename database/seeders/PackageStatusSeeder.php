<?php

namespace Database\Seeders;

use App\Models\Glossary\PackageStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PackageStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PackageStatus::create(['code' => 'created', 'name' => 'Создан']);
        PackageStatus::create(['code' => 'failed', 'name' => 'Содержит ошибки']);
        PackageStatus::create(['code' => 'accept', 'name' => 'Принят']);
    }
}
