<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'page_name',
        'category_id',
        'image',
        'total_cost',
        'energy_consumption',
        'production_variety',
        'occupied_area',
        'drying_time',
        'maintenance_cost',
        'product_quality',
        'operation_cost',
        'machine_quality'
    ];
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}
