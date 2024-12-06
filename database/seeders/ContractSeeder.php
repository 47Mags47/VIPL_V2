<?php

namespace Database\Seeders;

use App\Models\Glossary\Contract;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContractSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Contract::create(['bank_code' => '02', 'number' => '26032177', 'division_name' => 'ГКУ ЦСВИ', 'INN' => '4205382083', 'division_account' => '', 'BIK' => '043207001']);
    }
}
