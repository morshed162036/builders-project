<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Accounts\Chart_of_account;
class AccountChartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $charts = [
            ['id'=>1,'name'=>'Raw Matherials','accounts_group_id'=>1],
            ['id'=>2,'name'=>'Equipment','accounts_group_id'=>2]
        ];
        Chart_of_account::insert($charts);
    }
}
