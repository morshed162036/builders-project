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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('catalogue_id');
            $table->bigInteger('category_id');
            $table->bigInteger('brand_id')->default(0);
            $table->string('title');
            $table->string('product_code')->unique();
            $table->string('image')->nullable();
            $table->text('description')->nullable();
            $table->enum('type',['Product','Machine']);
            $table->enum('status',['Active','Inactive'])->default('Active');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
