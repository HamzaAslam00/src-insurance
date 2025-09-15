<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $fillable = [
        'business_name',
        'user_id',
        'owner_name',
        'phone',
        'email',
        'business_image',
        'client_name',
        'client_phone',
        'client_email',
        'client_address',
        'client_city',
        'client_state',
        'client_zip_code',
        'client_image',
        'status',
        'client_business_type',
        'client_business_type_other',
        'client_business_organization',
        'client_business_organization_other',
        'client_fein',
        'client_no_of_employees',
        'client_accountant_name',
        'client_accountant_phone',
        'client_accountant_email',
        'client_estimated_sales',
        'client_estimated_payroll',
        'partner_id',
        'quote_id',
        'proposal_id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function policies() {
        return $this->hasMany(Policy::class);
    }

    public function proposal()
    {
        return $this->hasOne(Proposal::class);
    }

}
