<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Stock\Product_stock;
use App\Models\Stock\Machine_stock;
class StockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $machines = [
            ['id'=>1,'product_id'=>4,'unit_id'=>0,'stock'=>0,'available'=>0,'hourly_rent'=>0],
            ['id'=>2,'product_id'=>5,'unit_id'=>0,'stock'=>0,'available'=>0,'hourly_rent'=>0]
        ];
        $products = [
            ['id'=>1,'product_id'=>1,'unit_id'=>0,'stock'=>0,'available'=>0,'unit_price'=>0],
            ['id'=>2,'product_id'=>2,'unit_id'=>0,'stock'=>0,'available'=>0,'unit_price'=>0],
            ['id'=>3,'product_id'=>3,'unit_id'=>0,'stock'=>0,'available'=>0,'unit_price'=>0]
        ];

        Machine_stock::insert($machines);
        Product_stock::insert($products);
    }
}
