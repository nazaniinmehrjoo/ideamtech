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
        'title', 'content', 'category', 'image'
    ];
    public function images()
    {
        return $this->hasMany(PostImage::class);
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
