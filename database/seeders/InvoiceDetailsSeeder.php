<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Invoice\Invoice_detail;
class InvoiceDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $details = [
            ['id'=>1,'invoice_id'=>1,'product_id'=>2,'sku'=>'jkw','quantity'=>2,'unit_id'=>4,'unit_price'=>25,'total_price'=>50],
            ['id'=>2,'invoice_id'=>1,'product_id'=>3,'sku'=>'hw','quantity'=>1,'unit_id'=>4,'unit_price'=>50,'total_price'=>50],
            ['id'=>3,'invoice_id'=>2,'product_id'=>4,'sku'=>'m644','quantity'=>1,'unit_id'=>4,'unit_price'=>100,'total_price'=>100],
        ];
        Invoice_detail::insert($details);
    }
}
