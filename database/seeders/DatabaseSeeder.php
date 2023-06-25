<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([PermissionSeeder::class,SuperAdminSeeder::class]);
        $this->call([BrandSeeder::class,CatalogueSeeder::class,CatagorySeeder::class,ProductSeeder::class]);
        $this->call([ClientSeeder::class,TeamSeeder::class]);
        $this->call([UnitSeeder::class]);
    }
}
