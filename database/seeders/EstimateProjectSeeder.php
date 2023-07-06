<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project\Project_estimation;

class EstimateProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $estimate_projects = [
            ['id'=>1,'project_id'=>1,'starting_date'=>'2023-07-05','ending_date'=>'2023-09-05','holy_days'=>'8','cost'=>50260.4]
        ];
        Project_estimation::insert($estimate_projects);
    }
}
