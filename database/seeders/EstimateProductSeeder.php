<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project\Estimation_product;
class EstimateProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            ['id'=>1,'estimation_id'=>1,'product_id'=>1,'unit_id'=>4,'qnt'=>2,'unit_price'=>15.20,'total_cost'=>30.40],
            ['id'=>2,'estimation_id'=>1,'product_id'=>2,'unit_id'=>4,'qnt'=>3,'unit_price'=>10,'total_cost'=>30]
        ];
        Estimation_product::insert($products);
    }
}
