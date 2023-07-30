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
        Schema::create('accounts_ledgers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('chart_of_account_id');
            $table->bigInteger('payment_method_id');
            $table->double('amount');
            $table->enum('type',['Credit','Debit']);
            $table->text('description')->nullable();
            $table->date('date');
            $table->string('post_ref')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('acounts_ledgers');
    }
};
