<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project\Team;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $teams = [
            ['id'=>1,'name'=>'team1','member_count'=>0,'team_type'=>'Employee','description'=>'','status'=>'Active'],
            ['id'=>2,'name'=>'team2','member_count'=>0,'team_type'=>'Laborer','description'=>'','status'=>'Active'],
        ];
        Team::insert($teams);
    }
}
