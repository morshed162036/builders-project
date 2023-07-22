<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Payroll\Benefit;
class BenefitsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $benefits = [
            ['id'=>1,'title'=>'test','description'=>'test description'],
            ['id'=>2,'title'=>'test 2','description'=>'test description 2'],
            ['id'=>3,'title'=>'test 3','description'=>'test description 3'],
        ];
        Benefit::insert($benefits);
    }
}
