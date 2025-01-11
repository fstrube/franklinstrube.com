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

    /**
     * Relationship to tags. Polymorphic.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable', 'taggables_tags')->orderBy('name', 'asc');
    }

    /**
     * Attribute mutator to generate URL by route name.
     * 
     * @return string
     */
    public function getUrlAttribute()
    {
        return route('posts.show', $this->slug);
    }

    /**
     * Scope to show only published posts.
     * 
     * @param mixed|\Illuminate\Contracts\Database\Query\Builder
     * @return void
     */
    public function scopePublished($query): void
    {
        $query->whereNotNull('published_at');
    }

    public function scopeSearch($query, $q): void
    {
        $query->where(function ($query) use ($q) {
            $query
                ->orWhere('title', 'like', '%' . $q . '%')
                ->orWhere('slug', 'like', '%' . $q . '%')
                ->orWhere('content', 'like', '%' . $q . '%');
        });
    }
}
