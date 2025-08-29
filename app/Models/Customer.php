<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = ['company_name','customer_name','email','mobile','landline','address1','address2','city','postal_code','country','status'];
}
