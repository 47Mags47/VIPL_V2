<?php

namespace Database\Seeders;

use App\Models\Glossary\CalendarGeneratorCalculation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CalendarCalculationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CalendarGeneratorCalculation::create(['code' => 'daily',        'name'=> 'Ежедневно',       'step' => '1 day'      ]);
        CalendarGeneratorCalculation::create(['code' => 'weekly',       'name'=> 'Еженедельно',     'step' => '1 week'     ]);
        CalendarGeneratorCalculation::create(['code' => 'monthly',      'name'=> 'Ежемесячно',      'step' => '1 month'    ]);
        CalendarGeneratorCalculation::create(['code' => 'quarterly',    'name'=> 'Ежеквартально',   'step' => '1 quarter'  ]);
        CalendarGeneratorCalculation::create(['code' => 'yearly',       'name'=> 'Ежегодно',        'step' => '1 year'     ]);
    }
}
