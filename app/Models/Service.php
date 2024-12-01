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
        'title' => 'array',
        'category' => 'array',
        'content' => 'array',
    ];
    public function getTranslatedTitle($locale = null)
    {
        $locale = $locale ?? app()->getLocale(); 
        return $this->title[$locale] ?? $this->title['en'] ?? null; 
    }
    public function getTranslatedCategory($locale = null)
    {
        $locale = $locale ?? app()->getLocale(); 
        return $this->category[$locale] ?? $this->category['en'] ?? null; 
    }
    public function getTranslatedContent($locale = null)
    {
        $locale = $locale ?? app()->getLocale(); 
        return $this->content[$locale] ?? $this->content['en'] ?? null; 
    }
    // Accessor to get the display pages for each service
    public function getDisplayPagesAttribute()
    {
        $pages = [];
    
        // Define valid page flags and their corresponding display names
        $validPages = [
            'Consulting' => 'show_on_consulting',
            'Parts Repairs' => 'show_on_parts_repairs',
            'Engineering' => 'show_on_engineering',
            'Installation' => 'show_on_installation',
            'After Sales' => 'show_on_after_sales',
        ];
    
        // Check each flag and add the page to $pages if the flag is true
        foreach ($validPages as $page => $column) {
            if ($this->$column) {
                $pages[] = $page;
            }
        }
    
        \Log::info('Display pages for service ID ' . $this->id . ': ' . json_encode($pages)); // Log for debugging
    
        return $pages;
    }
    
    
}
