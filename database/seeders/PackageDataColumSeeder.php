<?php

namespace Database\Seeders;

use App\Models\Glossary\PackageDataColumn;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PackageDataColumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public static function run(): void
    {
        PackageDataColumn::create(['code' => 'last_name',   'name' => 'Фамилия',    'id' => 1]);
        PackageDataColumn::create(['code' => 'first_name',  'name' => 'Имя',        'id' => 2]);
        PackageDataColumn::create(['code' => 'middle_name', 'name' => 'Отчество',   'id' => 3]);
        PackageDataColumn::create(['code' => 'account',     'name' => 'Счёт',       'id' => 4]);
        PackageDataColumn::create(['code' => 'summ',        'name' => 'Сумма',      'id' => 5]);
        PackageDataColumn::create(['code' => 'pasp',        'name' => '№ Пасп',     'id' => 6]);
        PackageDataColumn::create(['code' => 'birth',       'name' => 'ДР',         'id' => 7]);
        PackageDataColumn::create(['code' => 'kbk',         'name' => 'КБК',        'id' => 8]);
        PackageDataColumn::create(['code' => 'snils',       'name' => 'СНИЛС',      'id' => 9]);
    }
}
