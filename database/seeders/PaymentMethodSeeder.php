<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\settings\Payment_method;
class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $methods = [
            ['id'=>1,'bank_name'=>'One Bank','branch'=>'Mirpur-12','account_name'=>'Test Account','account_holder'=>'Test','account_no'=>'12345','phone'=>'12345678909','balance'=>100000],
            ['id'=>2,'bank_name'=>'City Bank','branch'=>'Mirpur-1','account_name'=>'Test Account 2','account_holder'=>'Test 2','account_no'=>'54321','phone'=>'90987654321','balance'=>100000]
        ];
        Payment_method::insert($methods);
    }
}
