<?php

namespace Database\Seeders;

use App\Models\Glossary\Division;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ### DIVISION
        ##################################################
        Division::create(['name' => 'ГКУ ЦСВИ',                           'code' => '000']);
        Division::create(['name' => 'УСЗН г. Кемерово',                   'code' => '001']);
        Division::create(['name' => 'УСЗН г. Анжеро-Судженска',           'code' => '005']);
        Division::create(['name' => 'УСЗН г. Березовский',                'code' => '006']);
        Division::create(['name' => 'КСЗН г. Белово',                     'code' => '007']);
        Division::create(['name' => 'УСЗН Гурьевского р-на',              'code' => '008']);
        Division::create(['name' => 'ОСЗН г. Киселевска',                 'code' => '009']);

        Division::create(['name' => 'УСЗН г. Ленинск-Кузнецкий',          'code' => '010']);
        Division::create(['name' => 'УСЗН Мариинского р-на',              'code' => '011']);
        Division::create(['name' => 'УСЗН г. Мыски',                      'code' => '012']);
        Division::create(['name' => 'УСЗН г. Междуреченска',              'code' => '013']);
        Division::create(['name' => 'КСЗН г. Новокузнецк',                'code' => '014']);
        Division::create(['name' => 'УСЗН г. Осинники',                   'code' => '019']);

        Division::create(['name' => 'КСЗН г. Прокопьевск',                'code' => '020']);
        Division::create(['name' => 'УСЗН г. Тайга',                      'code' => '023']);
        Division::create(['name' => 'УСЗН Таштагольского р-на',           'code' => '024']);
        Division::create(['name' => 'КСЗН Топкинского р-на',              'code' => '025']);
        Division::create(['name' => 'УСЗН г. Юрга',                       'code' => '026']);
        Division::create(['name' => 'УСЗН Беловского р-на',               'code' => '027']);
        Division::create(['name' => 'ОСЗН Ижморского р-на',               'code' => '028']);
        Division::create(['name' => 'УСЗН Кемеровского р-на',             'code' => '029']);

        Division::create(['name' => 'УСЗН Крапивинского р-на',            'code' => '030']);
        Division::create(['name' => 'УСЗН Ленинск-Кузнецкого р-на',       'code' => '031']);
        Division::create(['name' => 'УСЗН Новокузнецкого р-на',           'code' => '032']);
        Division::create(['name' => 'УСЗН Прокопьевского р-на',           'code' => '033']);
        Division::create(['name' => 'УСЗН Промышленновского р-на',        'code' => '034']);
        Division::create(['name' => 'УСЗН Тисульского р-на',              'code' => '035']);
        Division::create(['name' => 'УСЗН Тяжинского р-на',               'code' => '036']);
        Division::create(['name' => 'УСЗН Юргинского р-на',               'code' => '037']);
        Division::create(['name' => 'УСЗН Яйского р-на',                  'code' => '038']);
        Division::create(['name' => 'УСЗН Яшкинского р-на',               'code' => '039']);

        Division::create(['name' => 'ОСЗН Чебулинского р-на',             'code' => '041']);
        Division::create(['name' => 'ОСВиЛ Ленинского р-на г.Кемерово',   'code' => '043']);
        Division::create(['name' => 'УСЗН г. Полысаево',                  'code' => '044']);
        Division::create(['name' => 'УСЗН г. Калтан',                     'code' => '046']);
        Division::create(['name' => 'УСЗН г. Красный брод',               'code' => '049']);
    }
}
