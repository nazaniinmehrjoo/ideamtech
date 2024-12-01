<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'page_name',
        'description',
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
    protected $casts = [
        'name' => 'array', 
        'description' => 'array', 
    ];
    public function getTranslatedName($locale = null)
    {
        $locale = $locale ?? app()->getLocale(); 
        return $this->name[$locale] ?? $this->name['en']?? null; 
    }
    public function getTranslatedDescription($locale = null)
    {
        $locale = $locale ?? app()->getLocale(); 
        return $this->description[$locale] ?? $this->description['en'] ?? null; 
    }
}
