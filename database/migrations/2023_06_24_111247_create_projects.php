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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->bigInteger('client_id');
            $table->date('starting_date')->nullable();
            $table->date('finished_date')->nullable();
            $table->date('expected_finished_date')->nullable();
            $table->double('estimate_cost')->default(0);
            $table->double('actual_cost')->default(0);
            $table->enum('status',['Just Create','Start','Finished','Ongoing','Estimate','Hold'])->default('Just Create');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
