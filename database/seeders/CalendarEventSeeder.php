<?php

namespace Database\Seeders;

use App\Models\Glossary\CalendarEventStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CalendarEventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CalendarEventStatus::create(['code' => 'future',    'name' => 'Предстоящее']);
        CalendarEventStatus::create(['code' => 'opened',      'name' => 'Открыто']);
        CalendarEventStatus::create(['code' => 'closed',    'name' => 'Закрыто']);
    }
}
