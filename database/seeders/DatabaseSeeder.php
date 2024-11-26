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
        $this->call(CalendarEventSeeder::class);
        $this->call(PackageStatusSeeder::class);

        if(env('APP_ENV') === 'local'){
            $this->call(DevSeeder::class);
        }
    }
}
