<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Supplier;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $supplier = [
            ['id'=>1,'name'=>'Supplier 1','address'=>'Dhaka','city'=>'Dhaka','pincode'=>'1111','mobile'=>'12345678987','email'=>'supplier1@gmail.com','nid'=>'123','trade_license'=>'456','status'=>'Active']
        ];
        Supplier::insert($supplier);
    }
}
