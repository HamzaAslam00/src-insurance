<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Policy extends Model
{
    use HasFactory;
    protected $fillable = [
        'client_id',
        'name',
        'company_name',
        'premium',
        'description',
        'policy_type',
        'policy_type_other',
        'policy_number',
        'expiration_date',
        'effective_date',
        'file',
        'status',
    ];
    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }
    public function notices()
    {
        return $this->hasMany(Notice::class);
    }
    public function payment()
    {
        return $this->hasMany(Payment::class);
    }

}
