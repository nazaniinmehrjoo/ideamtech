<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerForm extends Model
{
    use HasFactory;

    protected $table = 'customer_forms'; 

    protected $fillable = [
        'code',
        'factory_name',
        'first_name',
        'last_name',
        'factory_number',
        'mobile_number',
        'province',
        'city',
        'address',
        'products',
        'kiln_type',
        'drying_method',
        'brick_count',
        'messaging_platforms',
    ];
}

