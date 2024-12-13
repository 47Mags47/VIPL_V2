<?php

namespace Database\Seeders;

use App\Models\Glossary\RaportSheme;
use App\Models\Glossary\RaportShemeType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RaportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ### SHEMES
        ##################################################
        ### TYPE
        RaportShemeType::create(['code' => 'file', 'name' => 'Файл']);
        RaportShemeType::create(['code' => 'class', 'name' => 'Класс']);

        ### SHEME
        RaportSheme::create(['code' => 'XML_SBER', 'type_code' => 'class', 'description' => 'Шаблон для Сбера']);
    }
}
