<?php

namespace Database\Seeders;

use App\Models\Glossary\RaportSheme;
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
        RaportSheme::create(['code' => 'XML_Default', 'description' => 'Стандартная XML схема']);
        RaportSheme::create(['code' => 'UralSib', 'description' => 'Схема для УралСиб банка']);

        RaportSheme::create(['code' => 'Other', 'description' => 'Схема для остальных банков']);
    }
}
