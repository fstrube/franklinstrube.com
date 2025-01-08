<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory;

    public $fillable = [
        'title',
        'content',
        'published_at',
    ];

    public $casts = [
        'published_at' => 'datetime',
    ];

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable', 'taggables_tags');
    }

    public function scopePublished($query)
    {
        $query->whereNotNull('published_at');
    }
}
