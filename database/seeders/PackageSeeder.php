<?php

namespace Database\Seeders;

use App\Models\Glossary\Bank;
use App\Models\Glossary\BankRaportType;
use App\Models\Glossary\Contract;
use App\Models\Glossary\PackageDataColumn;
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
        PackageStatus::create(['code' => 'created', 'name' => 'Создан']);
        PackageStatus::create(['code' => 'failed', 'name' => 'Содержит ошибки']);
        PackageStatus::create(['code' => 'accept', 'name' => 'Принят']);

        ### FILE
        ##################################################
        ### COLUMNS
        PackageDataColumn::create(['code' => 'first_name',  'name' => 'Фамилия']);
        PackageDataColumn::create(['code' => 'last_name',   'name' => 'Имя']);
        PackageDataColumn::create(['code' => 'middle_name', 'name' => 'Отчество']);
        PackageDataColumn::create(['code' => 'account',     'name' => 'Счёт']);
        PackageDataColumn::create(['code' => 'summ',        'name' => 'Сумма']);
        PackageDataColumn::create(['code' => 'pasp',        'name' => '№ Пасп']);
        PackageDataColumn::create(['code' => 'birth',       'name' => 'ДР']);
        PackageDataColumn::create(['code' => 'kbk',         'name' => 'КБК']);
        PackageDataColumn::create(['code' => 'snils',       'name' => 'СНИЛС']);

        ### STATUS
        PackageFileStatus::create(['code' => 'upload',          'name' => 'Загрузка']);
        PackageFileStatus::create(['code' => 'upload_error',    'name' => 'Ошибка загрузки']);
        PackageFileStatus::create(['code' => 'parse_error',     'name' => 'Ошибка чтения файла']);
        PackageFileStatus::create(['code' => 'uploaded',        'name' => 'Загружен']);
        PackageFileStatus::create(['code' => 'check',           'name' => 'Проверка']);
        PackageFileStatus::create(['code' => 'checked',         'name' => 'Проверен']);
        PackageFileStatus::create(['code' => 'failed',          'name' => 'Содержит ошибки']);
        PackageFileStatus::create(['code' => 'accept',          'name' => 'Принят']);

        ### BANKS
        BankRaportType::create(['code' => 'XML', 'name' => 'XML файл']);
        BankRaportType::create(['code' => 'XLS', 'name' => 'XLS файл']);

        Bank::create(['code' => '02',   'ru_code' => 'СБРФ8615',    'raport_type_code' => 'XML', 'name' => 'ПАО "Сбербанк России"']);
        Bank::create(['code' => '04',   'ru_code' => 'Открыт_Н',    'raport_type_code' => 'XLS', 'name' => 'ПАО "ФК Открытие" (нерезиденты)']);
        Bank::create(['code' => '05',   'ru_code' => 'Уралсиб',     'raport_type_code' => 'XLS', 'name' => 'ПАО "Банк Уралсиб"']);
        Bank::create(['code' => '06',   'ru_code' => 'Россельхоз',  'raport_type_code' => 'XLS', 'name' => 'АО "Россельхозбанк"']);
        Bank::create(['code' => '07',   'ru_code' => 'Уралс_карт',  'raport_type_code' => 'XLS', 'name' => 'ПАО "Банк Уралсиб" (карточка)']);
        Bank::create(['code' => '08',   'ru_code' => 'Кемсоцинба',  'raport_type_code' => 'XLS', 'name' => 'АО "Кемсоцинбанк"']);
        Bank::create(['code' => '09',   'ru_code' => 'Открытие20',  'raport_type_code' => 'XLS', 'name' => 'ПАО Банк "ФК Открытие" (20 символов)']);
        Bank::create(['code' => '10',   'ru_code' => 'Сбер_Нерез',  'raport_type_code' => 'XML', 'name' => 'ПАО "Сбербанк России" (нерезиденты)']);
        Bank::create(['code' => '11',   'ru_code' => 'Сбер_номин',  'raport_type_code' => 'XML', 'name' => 'ПАО "Сбербанк России" (номинальные счета)']);
        Bank::create(['code' => '12',   'ru_code' => 'Россельнер',  'raport_type_code' => 'XML', 'name' => 'АО "Россельхозбанк" (нерезиденты)']);
        Bank::create(['code' => '13',   'ru_code' => 'СБРФне8615',  'raport_type_code' => 'XML', 'name' => 'ПАО "Сбербанк России" (не 8615)']);
        Bank::create(['code' => '14',   'ru_code' => 'Газпромбан',  'raport_type_code' => 'XML', 'name' => 'АО "Газпромбанк"']);
        Bank::create(['code' => '15',   'ru_code' => 'Почта банк',  'raport_type_code' => 'XML', 'name' => 'ПАО "Почта банк"']);
        Bank::create(['code' => '16',   'ru_code' => 'Промсвязьб',  'raport_type_code' => 'XML', 'name' => 'ПАО "Промсвязьбанк']);
        Bank::create(['code' => '17',   'ru_code' => 'Банк ВТБ',    'raport_type_code' => 'XML', 'name' => 'ПАО "Банк ВТБ']);
        Bank::create(['code' => '19',   'ru_code' => 'АКБ',         'raport_type_code' => 'XML', 'name' => 'АКБ НМБ ОАО']);
        Bank::create(['code' => '20',   'ru_code' => 'КББ',         'raport_type_code' => 'XML', 'name' => 'КузнецкБизнессБанк']);
        Bank::create(['code' => '21',   'ru_code' => 'ЛЕВОБЕРЕЖ',   'raport_type_code' => 'XML', 'name' => 'ПАО БАНК "ЛЕВОБЕРЕЖНЫЙ"']);
        Bank::create(['code' => '22',   'ru_code' => 'АТБ',         'raport_type_code' => 'XML', 'name' => 'Азиатско Тихоокеанский Банк (ПАО)']);
        Bank::create(['code' => '23',   'ru_code' => 'Альфа-Банк',  'raport_type_code' => 'XML', 'name' => 'АО "Альфа-Банк"']);
        Bank::create(['code' => '24',   'ru_code' => 'Совкомбанк',  'raport_type_code' => 'XML', 'name' => 'ПАО "Совкомбанк"']);
        Bank::create(['code' => '25',   'ru_code' => 'ТарнсКредБ',  'raport_type_code' => 'XML', 'name' => 'ТрансКредитБанк']);
        Bank::create(['code' => '26',   'ru_code' => 'Тинькофф',    'raport_type_code' => 'XML', 'name' => 'АО "Т-Банк"']);
        Bank::create(['code' => '27',   'ru_code' => 'РГС Банк',    'raport_type_code' => 'XML', 'name' => 'Новосибирский филиал ПАО "РГС Банк"']);
        Bank::create(['code' => '28',   'ru_code' => 'РКЦБРФ',      'raport_type_code' => 'XML', 'name' => 'Расчетно-кассовый центр ЦБ РФ']);
        Bank::create(['code' => '29',   'ru_code' => 'К_УРАЛА',     'raport_type_code' => 'XML', 'name' => 'ООО КБ "Кольцо Урала"']);
        Bank::create(['code' => '31',   'ru_code' => 'Росбанк',     'raport_type_code' => 'XML', 'name' => 'ПАО "ПАО Росбанк"']);
        Bank::create(['code' => '32',   'ru_code' => 'Райффайзен ', 'raport_type_code' => 'XML', 'name' => 'Райффайзен банк']);
        Bank::create(['code' => '33',   'ru_code' => 'Русстандар',  'raport_type_code' => 'XML', 'name' => 'ПАО " Русский стандарт"']);
        Bank::create(['code' => '34',   'ru_code' => 'Углеметбан',  'raport_type_code' => 'XML', 'name' => 'Кузбасский филиал АО "Углеметбанк"']);
        Bank::create(['code' => '35',   'ru_code' => 'РНКБ',        'raport_type_code' => 'XML', 'name' => 'Российский национальный коммерческий банк']);
        Bank::create(['code' => '37',   'ru_code' => 'Восточный',   'raport_type_code' => 'XML', 'name' => 'ПАО банк "Восточный"']);
        Bank::create(['code' => '38',   'ru_code' => 'Зенит',       'raport_type_code' => 'XML', 'name' => 'ПАО "Банк Зенит"']);
        Bank::create(['code' => '39',   'ru_code' => 'Мособлбанк',  'raport_type_code' => 'XML', 'name' => 'ПАО "Мособлбанк"']);

        ### CONTRACTS
        Contract::create(['bank_code' => '02', 'payment_code' => '020', 'number' => '26032177', 'division_name' => 'ГКУ ЦСВИ', 'INN' => '4205382083', 'division_account' => '', 'BIK' => '043207001']);
    }
}
