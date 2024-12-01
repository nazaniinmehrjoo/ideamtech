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
    ];
    protected $casts = [
        'name' => 'array', 
        'description' => 'array', 
    ];
    public function getTranslatedName($locale = null)
    {
        $locale = $locale ?? app()->getLocale(); 
        return $this->name[$locale] ?? $this->name['en'] ?? null; 
    }
    public function getTranslatedDescription($locale = null)
    {
        $locale = $locale ?? app()->getLocale(); 
        return $this->description[$locale] ?? $this->description['en'] ??null; 
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}
