<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderProduct extends Model
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;
    protected $fillable =[
        'order_id',
        'name',
        'unit_price',
        'quantity',
        'description',

    ];
}
