<?php

namespace Database\Seeders;

use App\Models\Main\CalendarEvent;
use App\Models\Main\CalendarGeneratorRule;
use App\Models\Main\Package;
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
        User::create([
            'FIO' => 'Тестовый user',
            'email' => 'user@mail.ru',
            'division_code' => '001',
            'role_code' => 'user',
            'email_verified_at' => now(),
            'password' => Hash::make('user@mail.ru'),
        ]);

        User::create([
            'FIO' => 'Тестовый user2',
            'email' => 'user2@mail.ru',
            'division_code' => '005',
            'role_code' => 'user',
            'email_verified_at' => now(),
            'password' => Hash::make('user2@mail.ru'),
        ]);

        User::create([
            'FIO' => 'Тестовый moder',
            'email' => 'moder@mail.ru',
            'division_code' => '000',
            'role_code' => 'moder',
            'email_verified_at' => now(),
            'password' => Hash::make('moder@mail.ru'),
        ]);

        User::create([
            'FIO' => 'Тестовый admin',
            'email' => 'admin@mail.ru',
            'division_code' => '000',
            'role_code' => 'admin',
            'email_verified_at' => now(),
            'password' => Hash::make('admin@mail.ru'),
        ]);
    }
}
