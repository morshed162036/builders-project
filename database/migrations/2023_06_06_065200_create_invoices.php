<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('supplier_id')->default(0);
            $table->bigInteger('client_id')->default(0);
            $table->bigInteger('project_id')->default(0);
            $table->string('invoice_code')->unique();
            $table->date('issue_date');
            $table->date('due_date')->nullable();
            $table->double('discount')->default(0);
            $table->double('paid_amount')->default(0);
            $table->enum('payment_status',['Paid','Due','Partial','Advance','Project']);
            $table->enum('invoice_type',['Purchase','Sell','Project']);
            $table->integer('total_item')->default(0);
            $table->double('total_amount')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
