<?php

namespace Database\Seeders;

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
        PackageFileStatus::create(['code' => 'uploaded',    'name' => 'Загружен'        ]);
        PackageFileStatus::create(['code' => 'check',       'name' => 'Проверка'        ]);
        PackageFileStatus::create(['code' => 'checked',     'name' => 'Проверен'        ]);
        PackageFileStatus::create(['code' => 'failed',      'name' => 'Содержит ошибки' ]);
        PackageFileStatus::create(['code' => 'accept',      'name' => 'Принят'          ]);
    }
}
