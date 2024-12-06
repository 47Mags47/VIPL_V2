<?php

namespace Database\Seeders;

use App\Models\Main\CalendarEvent;
use App\Models\Main\CalendarGenerator;
use App\Models\Main\Package;
use App\Models\Main\PackageData;
use App\Models\Main\PackageFile;
use Illuminate\Database\Seeder;

class DevSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $generator = CalendarGenerator::factory(['status_code' => 'valid', 'date_start' => now()])->create();
        CalendarGenerator::factory(3, ['status_code' => 'valid'])->create();

        CalendarEvent::factory(['generator_id' => $generator->id])
            ->has(
                Package::factory()->count(3)
                ->has(
                    PackageFile::factory()->count(3)
                        ->has(
                            PackageData::factory()->count(3),
                            'data'
                        ),
                    'files'
                )
            )
            ->create();
    }
}
