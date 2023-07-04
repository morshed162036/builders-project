<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project\Estimation_otherexpense;
class EstimateOtherexpenseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $expenses = [
            ['id'=>1,'estimation_id'=>1,'expense_head'=>'TADA','details'=>'Travel cost','cost'=>2000],
            ['id'=>2,'estimation_id'=>1,'expense_head'=>'snacks','details'=>'','cost'=>200]
        ];
        Estimation_otherexpense::insert($expenses);
    }
}
