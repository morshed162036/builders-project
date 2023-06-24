<?php

namespace Database\Seeders;
use App\Models\Catalogue;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CatalogueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $catalogue = [
            ['id'=>1,'name'=>'Product','status'=>'Active'],
            ['id'=>2,'name'=>'Machine','status'=>'Active'],
        ];
        Catalogue::Insert($catalogue);
    }
}
