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
        PackageDataColumn::create(['code' => 'first_name',  'name' => 'Фамилия']);
        PackageDataColumn::create(['code' => 'last_name',   'name' => 'Имя']);
        PackageDataColumn::create(['code' => 'middle_name', 'name' => 'Отчество']);
        PackageDataColumn::create(['code' => 'account',     'name' => 'Счёт']);
        PackageDataColumn::create(['code' => 'summ',        'name' => 'Сумма']);
        PackageDataColumn::create(['code' => 'pasp',        'name' => '№ Пасп']);
        PackageDataColumn::create(['code' => 'birth',       'name' => 'ДР']);
        PackageDataColumn::create(['code' => 'kbk',         'name' => 'КБК']);
        PackageDataColumn::create(['code' => 'snils',       'name' => 'СНИЛС']);
    }
}
