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
        Schema::create('machine_stock_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('machine_stock_id');
            $table->bigInteger('invoice_id');
            $table->string('sku')->unique();
            $table->double('purchase_unit_price');
            $table->bigInteger('project_id')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('machine_stock_details');
    }
};
