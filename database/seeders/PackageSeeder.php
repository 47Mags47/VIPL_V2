<?php

namespace Database\Seeders;

use App\Models\Glossary\Bank;
use App\Models\Glossary\BankRaportType;
use App\Models\Glossary\PackageFileStatus;
use App\Models\Glossary\PackageStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ### PACKAGE
        ##################################################
        ### STATUS
        PackageStatus::create(['code' => 'created', 'name' => 'Создан'          ]);
        PackageStatus::create(['code' => 'failed', 'name' => 'Содержит ошибки'  ]);
        PackageStatus::create(['code' => 'accept', 'name' => 'Принят'           ]);

        ### FILE
        ##################################################
        ### STATUS
        PackageFileStatus::create(['code' => 'upload',          'name' => 'Загрузка'            ]);
        PackageFileStatus::create(['code' => 'upload_error',    'name' => 'Ошибка загрузки'     ]);
        PackageFileStatus::create(['code' => 'parse_error',     'name' => 'Ошибка чтения файла' ]);
        PackageFileStatus::create(['code' => 'uploaded',        'name' => 'Загружен'            ]);
        PackageFileStatus::create(['code' => 'check',           'name' => 'Проверка'            ]);
        PackageFileStatus::create(['code' => 'checked',         'name' => 'Проверен'            ]);
        PackageFileStatus::create(['code' => 'failed',          'name' => 'Содержит ошибки'     ]);
        PackageFileStatus::create(['code' => 'accept',          'name' => 'Принят'              ]);

        ### BANKS
        BankRaportType::create(['code' => 'XML', 'name' => 'XML файл']);
        BankRaportType::create(['code' => 'XLS', 'name' => 'XLS файл']);

        Bank::create(['code' => '02',   'ru_code' => 'СБРФ8615',    'raport_type_code' => 'XML', 'name' => 'ПАО "Сбербанк России'                        ]);
        Bank::create(['code' => '04',   'ru_code' => 'Открыт_Н',    'raport_type_code' => 'XLS', 'name' => 'ПАО "ФК Открытие" (нерезиденты)'             ]);
        Bank::create(['code' => '05',   'ru_code' => 'Уралсиб',     'raport_type_code' => 'XLS', 'name' => 'ПАО "Банк Уралсиб"'                          ]);
        Bank::create(['code' => '06',   'ru_code' => 'Россельхоз',  'raport_type_code' => 'XLS', 'name' => 'АО "Россельхозбанк"'                         ]);
        Bank::create(['code' => '07',   'ru_code' => 'Уралс_карт',  'raport_type_code' => 'XLS', 'name' => 'ПАО "Банк Уралсиб" (карточка)'               ]);
        Bank::create(['code' => '08',   'ru_code' => 'Кемсоцинба',  'raport_type_code' => 'XLS', 'name' => 'АО "Кемсоцинбанк"'                           ]);
        Bank::create(['code' => '09',   'ru_code' => 'Открытие20',  'raport_type_code' => 'XLS', 'name' => 'ПАО Банк "ФК Открытие" (20 символов)'        ]);
        Bank::create(['code' => '10',   'ru_code' => 'Сбер_Нерез',  'raport_type_code' => 'XML', 'name' => 'ПАО "Сбербанк России" (нерезиденты)'         ]);
        Bank::create(['code' => '11',   'ru_code' => 'Сбер_номин',  'raport_type_code' => 'XML', 'name' => 'ПАО "Сбербанк России" (номинальные счета)'   ]);
    }
}
