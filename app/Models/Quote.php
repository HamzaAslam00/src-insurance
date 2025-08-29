<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    use HasFactory;
    protected $fillable = [
        'service_type',
        'business_name',
        'business_owner',
        'business_email',
        'organization',
        'organization_other',
        'business_address',
        'business_telephone',
        'city',
        'state',
        'zip_code',
        'fein',
        'year_business_started',
        'year_business_started_other',
        'business_kind',
        'business_kind_other',
        'no_of_employees',
        'no_of_employees_other',
        'business_personal_property',
        'business_personal_property_other',
        'annual_employee_payroll',
        'annual_employee_payroll_other',
        'owner_payroll',
        'owner_payroll_other',
        'include_officer',
        'include_disablility',
        'revenue',
        'revenue_other',
        'note',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
