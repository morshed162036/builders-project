<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Accounts\Accounts_group;

class AccountGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $groups = [
            ['id'=>1,'name'=>'Current Assets'],
            ['id'=>2,'name'=>'Long Term Assets'],
            ['id'=>3,'name'=>'Current Liabilities'],
            ['id'=>4,'name'=>'Long Term Liabilities'],
        ];
        Accounts_group::insert($groups);
    }
}
