<?php

namespace Database\Seeders;

use App\Models\Main\CalendarEvent;
use App\Models\Main\CalendarGeneratorRule;
use App\Models\Main\Package;
use App\Models\Main\PackageData;
use App\Models\Main\PackageFile;
use App\Models\Main\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DevSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CalendarGeneratorRule::factory(['status_code' => 'valid', 'date_start' => now()])->create();
        CalendarGeneratorRule::factory(3, ['status_code' => 'valid'])->create();

        CalendarEvent::factory()
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

        User::create([
            'email' => 'user@mail.ru',
            'division_code' => '001',
            'email_verified_at' => now(),
            'password' => Hash::make('user@mail.ru'),
        ]);

        User::create([
            'email' => 'admin@mail.ru',
            'division_code' => '000',
            'email_verified_at' => now(),
            'password' => Hash::make('admin@mail.ru'),
        ]);
    }
}
