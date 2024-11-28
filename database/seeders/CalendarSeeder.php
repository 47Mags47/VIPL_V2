<?php

namespace Database\Seeders;

use App\Models\Glossary\CalendarEventStatus;
use App\Models\Glossary\CalendarGeneratorCalculation;
use App\Models\Glossary\CalendarGeneratorStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CalendarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ### GENERATOR
        ##################################################
        ### CALCULATION
        CalendarGeneratorCalculation::create(['code' => 'daily',        'name'=> 'Ежедневно',       'step' => '1 day'      ]);
        CalendarGeneratorCalculation::create(['code' => 'weekly',       'name'=> 'Еженедельно',     'step' => '1 week'     ]);
        CalendarGeneratorCalculation::create(['code' => 'monthly',      'name'=> 'Ежемесячно',      'step' => '1 month'    ]);
        CalendarGeneratorCalculation::create(['code' => 'quarterly',    'name'=> 'Ежеквартально',   'step' => '1 quarter'  ]);
        CalendarGeneratorCalculation::create(['code' => 'yearly',       'name'=> 'Ежегодно',        'step' => '1 year'     ]);

        ### STATUS
        CalendarGeneratorStatus::create(['code' => 'valid',     'name' => 'Действует'   ]);
        CalendarGeneratorStatus::create(['code' => 'deleted',   'name' => 'Удалено'     ]);
        CalendarGeneratorStatus::create(['code' => 'passed',    'name' => 'Устарело'    ]);


        ### EVENT
        ##################################################
        CalendarEventStatus::create(['code' => 'future',    'name' => 'Предстоящее' ]);
        CalendarEventStatus::create(['code' => 'opened',    'name' => 'Открыто'     ]);
        CalendarEventStatus::create(['code' => 'closed',    'name' => 'Закрыто'     ]);
    }
}
