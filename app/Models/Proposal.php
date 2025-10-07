<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    use HasFactory;
    protected $fillable = [
        'client_id',
        'quote_id',
        'business_name',
        'owner_name',
        'business_telephone',
        'address',
        'city',
        'state',
        'zip_code',
        'insurance_carrier',
        'down_payment',
        'monthly_payment',
        'no_of_monthly_payment',
        'finance_charge',
        'total',
        'aggregate',
        'aggregate_other',
        'products_complicated_oprations',
        'products_complicated_oprations_other',
        'each_occurence',
        'each_occurence_other',
        'damage_to_rented_premises',
        'damage_to_rented_premises_other',
        'medical_expenses',
        'medical_expenses_other',
        'business_personal_property',
        'business_personal_property_other',
        'building_coverage',
        'building_coverage_other',
        'deductible',
        'deductible_other',
        'service_fee',
        'service_fee_other',
        'liqour_interruption',
        'business_interruption',
        'professional_liability',
        'theft',
        'food_water_damage',
        'vandalism',
        'fire_wind',
        'dbl_policy_cost',
        'brokers_fee_wc',
        'brokers_fee_wc_other',
        'service_fee_dbl',
        'service_fee_dbl_other',
        'wc_coverage_by_accident',
        'wc_coverage_by_accident_other',
        'wc_coverage_each_employee',
        'wc_coverage_each_employee_other',
        'policy_limit',
        'file_path',
        'client_sign_path',
        'sign_date',
        'status',
    ];
}
