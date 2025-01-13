<?php

namespace App\Actions;

use App\Models\BlogPost;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UpdateBlogPost
{
    public function update(BlogPost $post, Request $request)
    {
        return DB::transaction(function () use ($post, $request) {
            $post->title = $request->title;
            $post->slug = $request->slug;
            $post->content = $request->content ?? '';
            $post->excerpt = $request->excerpt;

            if ($image = $request->file('image')) {
                $post->image = $image->storePublicly('posts/'.$post->id, ['disk' => 'public']);
            }

            $post->save();

            $tags = collect($request->tags)->sort();

            Tag::insertOrIgnore($tags->map(function ($tagName) {
                return ['name' => $tagName];
            })->values()->all());

            $query = Tag::whereIn('name', $request->tags ?? [])->orderBy('name', 'asc');
            $post->tags()->sync($query->pluck('id'));

            return $post;
        });
    }
}
