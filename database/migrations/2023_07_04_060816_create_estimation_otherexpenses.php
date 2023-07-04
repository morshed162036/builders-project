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
        Schema::create('estimation_otherexpenses', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('estimation_id');
            $table->string('expense_head');
            $table->text('details')->nullable();
            $table->double('cost');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estimation_otherexpenses');
    }
};
