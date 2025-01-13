<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use League\CommonMark\Extension\Attributes\AttributesExtension;
use League\CommonMark\GithubFlavoredMarkdownConverter;

class BlogPost extends Model
{
    /**
     * This model has a factory class
     *
     * @use HasFactory<\Database\Factories\PostFactory>
     */
    use HasFactory;

    /**
     * The maximum character length for an excerpt
     */
    const MAX_EXCERPT_LENGTH = 200;

    /**
     * The attributes that can be filled on the model
     */
    public $fillable = [
        'title',
        'slug',
        'content',
        'excerpt',
        'published_at',
    ];

    /**
     * The attributes that are casted on the model
     */
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
     * Get the excerpt for the post. Can be stored in the database or
     * generated from the content. Will split on `<!--more-->` comment
     * in the content, or default to 200 characters.
     *
     * @return string
     */
    public function getExcerptAttribute()
    {
        if ($this->attributes['excerpt'] ?? null !== null) {
            return $this->attributes['excerpt'];
        }

        [$excerpt] = preg_split('/<!--\s*more\s*-->/i', $this->html);

        $excerpt = strip_tags($excerpt);

        if (strlen($excerpt) > static::MAX_EXCERPT_LENGTH) {
            $excerpt = substr($excerpt, 0, static::MAX_EXCERPT_LENGTH).'...';
        }

        return $excerpt;
    }

    /**
     * Attribute mutator to convert markdown to html
     *
     * @return string
     */
    public function getHtmlAttribute()
    {
        $converter = new GithubFlavoredMarkdownConverter;

        $converter->getEnvironment()->addExtension(new AttributesExtension());

        return $converter->convert($this->content);
    }

    /**
     * Attribute mutator to generate URL by route name.
     *
     * @return string
     */
    public function getUrlAttribute()
    {
        return route('blog.posts.show', $this->slug);
    }

    /**
     * Scope to show only published posts.
     *
     * @param  mixed|\Illuminate\Contracts\Database\Query\Builder  $query
     */
    public function scopePublished($query): void
    {
        $query->whereNotNull('published_at');
    }

    /**
     * Scope for searching by keyword.
     *
     * @param  mixed|\Illuminate\Contracts\Database\Query\Builder  $query
     * @param  string  $q
     */
    public function scopeSearch($query, $q): void
    {
        $query->where(
            function ($query) use ($q) {
                $query
                    ->orWhere('title', 'like', '%'.$q.'%')
                    ->orWhere('slug', 'like', '%'.$q.'%')
                    ->orWhere('content', 'like', '%'.$q.'%');
            }
        );
    }
}
