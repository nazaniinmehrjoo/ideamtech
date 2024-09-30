<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customerForm extends Model
{
    use HasFactory;

    protected $fillable = [
        'factory_code',
        'factory_name',
        'first_name',
        'last_name',
        'factory_phone',
        'mobile_phone',
        'province',
        'city',
        'address',
        'products',
        'kiln_type',
        'dryer_type',
        'dough_count',
        'messenger',
        'instagram_id',
    ];
    protected $casts = [
        'products' => 'array',
        'messenger' => 'array',
    ];
}
