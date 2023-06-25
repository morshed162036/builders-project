<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\settings\Unit;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $units = [
            ['id'=>1,'name'=>'Kilogram per cubic metre','unit'=>'Kg/cu.m','status'=>'Active'],
            ['id'=>2,'name'=>'Gram per cubic centimetre','unit'=>'G/cu.cm','status'=>'Active'],
            ['id'=>3,'name'=>'pounds per cubic foot','unit'=>'lb/cu.ft','status'=>'Active'],
            ['id'=>4,'name'=>'Piece','unit'=>'pic','status'=>'Active'],
            ['id'=>5,'name'=>'Box','unit'=>'box','status'=>'Active'],
            ['id'=>6,'name'=>'Kilogram','unit'=>'Kg','status'=>'Active'],
            ['id'=>7,'name'=>'Gram','unit'=>'g','status'=>'Active'],
        ];
        Unit::Insert($units);
    }
}
