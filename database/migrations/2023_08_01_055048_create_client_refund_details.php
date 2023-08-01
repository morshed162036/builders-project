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
        Schema::create('client_refund_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('client_refund_id');
            $table->bigInteger('product_id');
            $table->integer('qnt');
            $table->double('price');
            $table->enum('product_condition',['Damage','Exchange']);
            $table->enum('status',['Return_from_client','Return_to_supplier','Return_to_stock'])->default('Return_from_client');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client_refund_details');
    }
};
