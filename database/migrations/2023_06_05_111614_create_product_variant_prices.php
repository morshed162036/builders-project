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
        Schema::create('product_variant_prices', function (Blueprint $table) {
            $table->id();
            $table->string('variant_list');
            $table->string('sku')->unique();
            $table->bigInteger('unit_id');
            $table->double('previous_unit_price')->default(0);
            $table->integer('previous_stock')->default(0);
            $table->double('current_unit_price');
            $table->integer('current_stock');
            $table->bigInteger('product_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_variant_prices');
    }
};
