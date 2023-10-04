<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Salary;
class SalarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $salary = [
            ['id'=>'1','user_id'=>'1','date'=>'2023-08-05','year'=>'2023','month'=>'8','basic'=>'100000','food_bill'=>'1000','amount'=>'101000','advance'=>'0','current_balance'=>'101000'],
            ['id'=>'2','user_id'=>'1','date'=>'2023-09-05','year'=>'2023','month'=>'9','basic'=>'100000','food_bill'=>'1000','amount'=>'101000','advance'=>'0','current_balance'=>'101000'],
        ];
        Salary::insert($salary);
    }
}
