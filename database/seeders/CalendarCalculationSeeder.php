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
        CalendarGeneratorCalculation::create(['code' => 'daily',        'name'=> 'Ежедневно',       'calculate' => '1 day'      ]);
        CalendarGeneratorCalculation::create(['code' => 'weekly',       'name'=> 'Еженедельно',     'calculate' => '1 week'     ]);
        CalendarGeneratorCalculation::create(['code' => 'monthly',      'name'=> 'Ежемесячно',      'calculate' => '1 month'    ]);
        CalendarGeneratorCalculation::create(['code' => 'quarterly',    'name'=> 'Ежеквартально',   'calculate' => '1 quarter'  ]);
        CalendarGeneratorCalculation::create(['code' => 'yearly',       'name'=> 'Ежегодно',        'calculate' => '1 year'     ]);
    }
}
