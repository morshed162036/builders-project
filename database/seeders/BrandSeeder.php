<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Brand;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands = [
            ['id'=>1,'name'=>'Caterpillar (CAT)','description'=>'','address'=>'','image'=>'','status'=>'Active'],
            ['id'=>2,'name'=>'Komatsu','description'=>'','address'=>'','image'=>'','status'=>'Active'],
            ['id'=>3,'name'=>'Hitachi','description'=>'','address'=>'','image'=>'','status'=>'Active']
        ];
        Brand::insert($brands);
    }
}
