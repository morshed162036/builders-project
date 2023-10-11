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
        $this->call([PermissionSeeder::class,DesignationSeeder::class,SuperAdminSeeder::class]);
        $this->call([UnitSeeder::class,PaymentMethodSeeder::class,BalanceTransferSeeder::class]);
        $this->call([BrandSeeder::class,CatalogueSeeder::class,CatagorySeeder::class,ProductSeeder::class,StockSeeder::class]);
        $this->call([SupplierSeeder::class]);
        $this->call([AccountGroupSeeder::class,AccountChartSeeder::class]);
        $this->call([ClientSeeder::class,TeamSeeder::class,ProjectSeeder::class]);
        $this->call([EstimateProjectSeeder::class,EstimateProductSeeder::class,EstimateMachineSeeder::class,EstimateEmployeeSeeder::class,EstimateLaborerSeeder::class,EstimateOtherexpenseSeeder::class]);
        $this->call([InvoiceSeeder::class,InvoiceDetailsSeeder::class]);
        $this->call([BenefitsSeeder::class,SalarySeeder::class]);
        //$this->call(SuperAdminSeeder::class);
        

    }
}
