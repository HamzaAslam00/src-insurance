<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    use HasFactory;

    protected $fillable = [
        'start_date', 'end_date', 'reason', 'detail', 'applied_by', 'status', 'approved_by', 'document','day_type'
    ];

    /**
     * Relationship: User who applied for this leave.
     */
    public function appliedByUser()
    {
        return $this->belongsTo(User::class, 'applied_by');
    }

    /**
     * Relationship: User who approved this leave.
     */
    public function approvedByUser()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }

}
