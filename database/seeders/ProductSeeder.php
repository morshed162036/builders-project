<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            ['id'=>1,'catalogue_id'=>1,'category_id'=>3,'title'=>'Scan Cement','brand_id'=>5,'product_code'=>'PCSC40','type'=>'Product'],
            ['id'=>2,'catalogue_id'=>1,'category_id'=>3,'title'=>'JK White Cement',
            'brand_id'=>7,'product_code'=>'PCJK1','type'=>'Product'],
            ['id'=>3,'catalogue_id'=>1,'category_id'=>3,'title'=>'Hanson White Cement',
            'brand_id'=>6,'product_code'=>'PCHWC25','type'=>'Product'],
            ['id'=>4,'catalogue_id'=>2,'category_id'=>6,'title'=>'MST BACKHOE LOADER M644','brand_id'=>4,'product_code'=>'MBL-M644','type'=>'Machine'],
            ['id'=>5,'catalogue_id'=>2,'category_id'=>6,'title'=>'MST BACKHOE LOADER M544','brand_id'=>4,'product_code'=>'MBL-M544','type'=>'Machine'],
        ];
        Product::Insert($products);
    }
}
