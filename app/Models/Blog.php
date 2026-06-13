<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Blog extends Model
{
    protected $table = 'blog';

    protected $fillable = [
        'judul', 'slug', 'isi', 'kategori',
        'thumbnail', 'penulis', 'is_featured', 'views',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($blog) {
            if (empty($blog->slug)) {
                $blog->slug = Str::slug($blog->judul);
            }
        });
    }

    public function getThumbnailUrlAttribute(): string
    {
        if ($this->thumbnail) {
            return asset('storage/' . $this->thumbnail);
        }
        return asset('img/blog-default.jpg');
    }

    public function getExcerptAttribute(): string
    {
        return Str::limit(strip_tags($this->isi), 120);
    }
}
