<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call(CalendarSeeder::class);
        $this->call(PackageSeeder::class);
        $this->call(UserSeeder::class);

        if(env('APP_ENV') === 'local') $this->call(DevSeeder::class);
    }
}
