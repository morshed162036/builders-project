<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project\Project;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = [
            ['id'=>1,'name'=>'project 1','client_id'=>1,'estimate_cost'=>0,'actual_cost'=>0,'status'=>'Just Create'],
            ['id'=>2,'name'=>'project 2','client_id'=>2,'estimate_cost'=>0,'actual_cost'=>0,'status'=>'Just Create']
        ];

        Project::insert($projects);
    }
}
