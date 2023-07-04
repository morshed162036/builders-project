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
        Schema::create('estimation_products', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('estimation_id');
            $table->bigInteger('product_id');
            $table->bigInteger('unit_id');
            $table->integer('qnt');
            $table->double('unit_price');
            $table->double('total_cost');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estimation_products');
    }
};
