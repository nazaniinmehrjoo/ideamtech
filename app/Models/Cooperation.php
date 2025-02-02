<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cooperation extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name',
        'company_phone',
        'company_email',
        'country',
        'national_id',
        'address',
        'activity_field',
        'representative_first_name',
        'representative_last_name',
        'representative_phone'
    ];
}
