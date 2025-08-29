<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Traits\HasRoles;
class Order extends Model
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;
    protected $fillable = [
        'company_name',
        'customer_name',
        'email',
        'mobile',
        'landline',
        'address1',
        'address2',
        'city',
        'postal_code',
        'country',
        'number_of_items',
        'note',
        'vat',
        'status',
    ];

    public function orderProducts()
    {
        return $this->hasMany(OrderProduct::class);
    }
}
