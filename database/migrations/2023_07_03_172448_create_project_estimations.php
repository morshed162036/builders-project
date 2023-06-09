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
        Schema::create('project_estimations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('project_id');
            $table->date('starting_date');
            $table->date('ending_date');
            $table->integer('holy_days');
            $table->double('cost')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_estimations');
    }
};
