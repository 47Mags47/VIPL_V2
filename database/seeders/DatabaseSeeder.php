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
        $this->call(CalendarCalculationSeeder::class);
        $this->call(CalendarEventSeeder::class);
        $this->call(PackageStatusSeeder::class);
        $this->call(PackageFileStatusSeeder::class);

        if(env('APP_ENV') === 'local'){
            $this->call(DevSeeder::class);
        }
    }
}
