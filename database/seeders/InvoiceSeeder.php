<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Invoice\Invoice;
class InvoiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $invoices = [
            ['id'=>1,'supplier_id'=>1,'client_id'=>0,'project_id'=>0,'invoice_code'=>'pu-1','issue_date'=>'2023-7-8','due_date'=>'2023-8-8','payment_status'=>'Due','invoice_type'=>'Purchase','total_item'=>2,'total_amount'=>100],
            ['id'=>2,'supplier_id'=>0,'client_id'=>0,'project_id'=>1,'invoice_code'=>'pr-1','issue_date'=>'2023-7-8','due_date'=>'2023-9-8','payment_status'=>'Due','invoice_type'=>'Project','total_item'=>1,'total_amount'=>100]
        ];
        Invoice::insert($invoices);
    }
}
