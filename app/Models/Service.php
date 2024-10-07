<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    
    protected $table = 'services';

    
    protected $fillable = [
        'title',           
        'category',        
        'content',         
        'banner_images',   
        'show_on_consulting',       
        'show_on_parts_repairs',    
        'show_on_engineering',      
        'show_on_installation',     
        'show_on_after_sales'       
    ];

    protected $casts = [
        'banner_images' => 'array',
    ];
}
