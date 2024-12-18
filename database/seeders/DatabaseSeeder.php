<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call(UserSeeder::class);
        $this->call(CalendarSeeder::class);
        $this->call(RaportSeeder::class);
        $this->call(PackageSeeder::class);
        $this->call(ValidatorSeeder::class);

        if(env('APP_ENV') === 'local') $this->call(DevSeeder::class);
    }
}
