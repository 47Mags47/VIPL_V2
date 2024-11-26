<?php

namespace Database\Seeders;

use App\Models\Glossary\PackageFileStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PackageFileStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PackageFileStatus::create(['code' => 'uploaded',    'name' => 'Загружен']);
        PackageFileStatus::create(['code' => 'check',       'name' => 'Проверка']);
        PackageFileStatus::create(['code' => 'checked',     'name' => 'Проверен']);
        PackageFileStatus::create(['code' => 'failed',      'name' => 'Содержит ошибки']);
        PackageFileStatus::create(['code' => 'accept',      'name' => 'Принят']);
    }
}
