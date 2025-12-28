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
        Schema::create('proposals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('quote_id');
            $table->string('business_name');
            $table->string('owner_name');
            $table->string('business_telephone');
            $table->string('address');
            $table->string('city');
            $table->string('state');
            $table->string('zip_code');
            $table->string('insurance_carrier');
            $table->string('down_payment');
            $table->string('monthly_payment');
            $table->string('no_of_monthly_payment');
            $table->string('finance_charge')->nullable();
            $table->string('total');
            
            $table->string('aggregate')->nullable();
            $table->string('aggregate_other')->nullable();
            $table->string('products_complicated_oprations')->nullable();
            $table->string('products_complicated_oprations_other')->nullable();
            $table->string('each_occurence')->nullable();
            $table->string('each_occurence_other')->nullable();
            $table->string('damage_to_rented_premises')->nullable();
            $table->string('damage_to_rented_premises_other')->nullable();
            $table->string('medical_expenses')->nullable();
            $table->string('medical_expenses_other')->nullable();
            $table->string('business_personal_property')->nullable();
            $table->string('business_personal_property_other')->nullable();
            $table->string('building_coverage')->nullable();
            $table->string('building_coverage_other')->nullable();
            $table->string('deductible')->nullable();
            $table->string('deductible_other')->nullable();
            $table->string('service_fee')->nullable();
            $table->string('service_fee_other')->nullable();
            $table->string('liqour_interruption')->nullable();
            $table->string('business_interruption')->nullable();
            $table->string('professional_liability')->nullable();
            $table->string('theft')->nullable();
            $table->string('food_water_damage')->nullable();
            $table->string('vandalism')->nullable();
            $table->string('fire_wind')->nullable();

            $table->string('dbl_policy_cost')->nullable();
            $table->string('brokers_fee_wc')->nullable();
            $table->string('brokers_fee_wc_other')->nullable();
            $table->string('service_fee_dbl')->nullable();
            $table->string('service_fee_dbl_other')->nullable();
            $table->string('wc_coverage_by_accident')->nullable();
            $table->string('wc_coverage_by_accident_other')->nullable();
            $table->string('wc_coverage_each_employee')->nullable();
            $table->string('wc_coverage_each_employee_other')->nullable();
            $table->string('policy_limit')->nullable();
            $table->string('disability_weekly_pay')->nullable();
            
            $table->string('file_path')->nullable();
            $table->json('client_sign_path')->nullable();
            $table->dateTime('sign_date')->nullable();
            $table->string('status')->default('unsigned');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proposals');
    }
};
