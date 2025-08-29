<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = [
        'policy_id',
        'paid_amount',
        'transaction_date',
        'payment_method',

    ];
    public function policy()
    {
        return $this->belongsTo(Policy::class);
    }
}
