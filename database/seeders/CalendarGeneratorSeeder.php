<?php

namespace Database\Seeders;

use App\Models\Glossary\CalendarGeneratorStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CalendarGeneratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CalendarGeneratorStatus::create(['code' => 'valid', 'name' => 'Действует']);
        CalendarGeneratorStatus::create(['code' => 'deleted', 'name' => 'Удалено']);
        CalendarGeneratorStatus::create(['code' => 'passed', 'name' => 'Устарело']);
    }
}
