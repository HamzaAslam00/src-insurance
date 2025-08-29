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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('business_name');
            $table->unsignedBigInteger('user_id');
            $table->string('owner_name');
            $table->string('phone');
            $table->string('email');
            $table->string('business_image')->nullable();
            $table->string('client_name');
            $table->string('client_phone');
            $table->string('client_email');
            $table->string('client_address');
            $table->string('client_city');
            $table->string('client_state');
            $table->string('client_zip_code');
            $table->string('client_image')->nullable();
            
            $table->string('client_business_type')->nullable();
            $table->string('client_business_type_other')->nullable();
            $table->string('client_business_organization')->nullable();
            $table->string('client_business_organization_other')->nullable();
            $table->string('client_fein')->nullable();
            $table->string('client_no_of_employees')->nullable();
            $table->string('client_accountant_name')->nullable();
            $table->string('client_accountant_phone')->nullable();
            $table->string('client_accountant_email')->nullable();
            $table->string('client_estimated_sales')->nullable();
            $table->string('client_estimated_payroll')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
