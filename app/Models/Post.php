<?php

namespace App\Models;

use App\Models\PostImage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $dates = ['created_at', 'updated_at'];
    protected $fillable = [
        'title',
        'content',
        'category',
        'image'
    ];
    protected $casts = [
        'title' => 'array',
        'content' => 'array',
        'category' => 'array',
    ];

    public function getTranslatedtitle($locale = null)
    {
        $locale = $locale ?? app()->getLocale();
        return $this->title[$locale] ?? $this->title['en'] ?? null;
    }
    public function getTranslatedcontent($locale = null)
    {
        $locale = $locale ?? app()->getLocale();
        return $this->content[$locale] ?? $this->content['en'] ?? null;
    }

    public function getTranslatedcategory($locale = null)
    {
        $locale = $locale ?? app()->getLocale();
        return $this->category[$locale] ?? $this->category['en'] ?? null;
    }

    public function images()
    {
        return $this->hasMany(PostImage::class, 'post_id');
    }


    // Format created_at for diffForHumans
    public function getCreatedAtAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->diffForHumans();
    }

    /**
     * Get the URL to the main post image.
     */
    public function getImageUrlAttribute()
    {
        return $this->image ? asset('storage/' . $this->image) : asset('images/default.png');
    }
}
