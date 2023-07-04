<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project\Estimation_machine;
class EstimateMachineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $machines = [
            ['id'=>1,'estimation_id'=>1,'product_id'=>4,'qnt'=>2,'using_days'=>15,'daily_hours'=>8,'hourly_cost'=>50,'total_cost'=>2*8*50*15]
        ];
        Estimation_machine::insert($machines);
    }
}
