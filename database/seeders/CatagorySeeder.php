<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CatagorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['id'=>1,'parent_id'=>0,'catalogue_id'=>1,'name'=>'Cement'],
            ['id'=>2,'parent_id'=>0,'catalogue_id'=>2,'name'=>'Loader'],
            ['id'=>3,'parent_id'=>1,'catalogue_id'=>1,'name'=>'White Cement'],
            ['id'=>4,'parent_id'=>1,'catalogue_id'=>1,'name'=>'Water Repellant Cement'],
            ['id'=>5,'parent_id'=>1,'catalogue_id'=>1,'name'=>'Sulfate Resistant'],
            ['id'=>6,'parent_id'=>2,'catalogue_id'=>2,'name'=>'Backhoe'],
            ['id'=>7,'parent_id'=>2,'catalogue_id'=>2,'name'=>'Skid steer'],
            ['id'=>8,'parent_id'=>2,'catalogue_id'=>2,'name'=>'Track-type']
        ];

        Category::Insert($categories);
    }
}
