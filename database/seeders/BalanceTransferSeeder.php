<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\settings\Payment_transfer;
class BalanceTransferSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $transfer = [
            ['id'=>1,'from_id'=>1,'to_id'=>2,'balance'=>1000,'reference'=>'transfer-1']
        ];
        Payment_transfer::insert($transfer);
    }
}
