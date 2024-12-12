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
        $test_user = User::create([
            'email' => 'user@mail.ru',
            'division_code' => '001',
            'role_code' => 'user',
            'email_verified_at' => now(),
            'password' => Hash::make('user@mail.ru'),
        ]);

        User::create([
            'email' => 'moder@mail.ru',
            'division_code' => '000',
            'role_code' => 'moder',
            'email_verified_at' => now(),
            'password' => Hash::make('moder@mail.ru'),
        ]);

        User::create([
            'email' => 'admin@mail.ru',
            'division_code' => '000',
            'role_code' => 'admin',
            'email_verified_at' => now(),
            'password' => Hash::make('admin@mail.ru'),
        ]);

        CalendarGeneratorRule::factory(['status_code' => 'valid', 'date_start' => now()])->create();
        CalendarGeneratorRule::factory(3, ['status_code' => 'valid'])->create();

        CalendarEvent::factory(['status_code' => 'opened'])
            ->has(
                Package::factory()
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

        Package::factory(['division_code' => '005'])
            ->has(
                PackageFile::factory()->count(3)
                    ->has(
                        PackageData::factory()->count(3),
                        'data'
                    ),
                'files'
            )
            ->create();
    }
}
