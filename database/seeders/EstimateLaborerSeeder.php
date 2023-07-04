<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project\Estimation_laborer;
class EstimateLaborerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $laborer = [
            ['id'=>1,'estimation_id'=>1,'designation'=>'Plumber','head_count'=>2,'working_days'=>20,'daily_salary'=>100,'Total_cost'=>2*20*100]
        ];
        Estimation_laborer::insert($laborer);
    }
}
