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
        Schema::create('quotes', function (Blueprint $table) {
            $table->id();
            $table->string('service_type');
            $table->string('business_name');
            $table->string('business_owner');
            $table->string('business_email');
            $table->string('organization');
            $table->string('organization_other')->nullable();
            $table->string('business_address');
            $table->string('business_telephone');
            $table->string('city');
            $table->string('state');
            $table->string(column: 'zip_code');
            $table->string('fein')->nullable();
            $table->string('year_business_started');
            $table->string('year_business_started_other')->nullable();
            $table->string('business_kind');
            $table->string('business_kind_other')->nullable();
            $table->string('no_of_employees');
            $table->string('no_of_employees_other')->nullable();
            $table->string('business_personal_property')->nullable();
            $table->string('business_personal_property_other')->nullable();
            $table->string('annual_employee_payroll')->nullable();
            $table->string('annual_employee_payroll_other')->nullable();
            $table->string('owner_payroll')->nullable();
            $table->string('owner_payroll_other')->nullable();
            $table->string('include_officer')->nullable();
            $table->string('include_disablility')->nullable();
            $table->string('revenue')->nullable();
            $table->string('revenue_other')->nullable();
            $table->string('note')->nullable();
            $table->enum('status', ['pending', 'replied'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quotes');
    }
};
