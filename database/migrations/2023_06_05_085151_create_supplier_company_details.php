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
        Schema::create('supplier_company_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('supplier_id');
            $table->string('name');
            $table->string('address');
            $table->string('city');
            $table->string('pincode');
            $table->string('mobile');
            $table->string('website')->nullable();
            $table->string('logo')->nullable();
            $table->string('email')->unique();
            $table->string('address_proof');
            $table->string('license_certificate');
            $table->string('tin_certificate');
            $table->enum('status',['Processing','Active','Inactive'])->default('Processing');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('supplier_company_details');
    }
};
