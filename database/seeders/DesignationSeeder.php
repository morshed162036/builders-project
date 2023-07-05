<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Designation;
class DesignationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $designations = [
            ['id'=>1,'title'=>'Site Engineer','description'=>'test','type'=>'Employee','status'=>'Active'],
            ['id'=>2,'title'=>'Quality Control Engineer','description'=>'test','type'=>'Employee','status'=>'Active'],
            ['id'=>3,'title'=>'Technical Field Engineer','description'=>'test','type'=>'Employee','status'=>'Active'],
            ['id'=>4,'title'=>'Construction Planning Engineer','description'=>'test','type'=>'Employee','status'=>'Active'],
            ['id'=>5,'title'=>'Construction Engineer','description'=>'test','type'=>'Employee','status'=>'Active'],
            ['id'=>6,'title'=>'Plumber','description'=>'test','type'=>'Laborer','status'=>'Active'],
            ['id'=>7,'title'=>'Electricians','description'=>'test','type'=>'Laborer','status'=>'Active'],
            ['id'=>8,'title'=>'Ironworker','description'=>'test','type'=>'Laborer','status'=>'Active'],
            ['id'=>9,'title'=>'Mason','description'=>'test','type'=>'Laborer','status'=>'Active'],
            ['id'=>10,'title'=>'Pipefitter','description'=>'test','type'=>'Laborer','status'=>'Active'],
        ];
        Designation::insert($designations);
    }
}
