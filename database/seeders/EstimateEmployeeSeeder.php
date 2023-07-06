<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project\Estimation_employee;
class EstimateEmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $employees = [
            ['id'=>1,'estimation_id'=>1,'designation_id'=>1,'head_count'=>2,'working_hours'=>8,'working_days'=>20,'hourly_salary'=>100,'Total_cost'=>2*8*20*100]
        ];
        Estimation_employee::insert($employees);
    }
}
