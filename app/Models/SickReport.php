<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SickReport extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function appliedByUser()
    {
        return $this->belongsTo(User::class, 'applied_by');
    }
}
