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
        Schema::create('estimation_employees', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('estimation_id');
            $table->bigInteger('designation_id');
            $table->integer('head_count');
            $table->integer('working_hours');
            $table->integer('working_days');
            $table->double('hourly_salary');
            $table->double('Total_cost');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estimation_employees');
    }
};
