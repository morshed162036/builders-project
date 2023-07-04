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
        Schema::create('estimation_machines', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('estimation_id');
            $table->bigInteger('product_id');
            $table->integer('qnt');
            $table->integer('using_days');
            $table->integer('daily_hours');
            $table->double('hourly_cost');
            $table->double('total_cost');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estimation_machines');
    }
};
