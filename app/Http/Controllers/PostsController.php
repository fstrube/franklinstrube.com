<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;

class PostsController extends Controller
{
    public function show(BlogPost $post)
    {
        $previous = BlogPost::published($post->published_at)
            ->orderBy('published_at', 'desc')
            ->first();
        $next = BlogPost::published(now())
            ->where('published_at', '>', $post->published_at)
            ->orderBy('published_at', 'asc')
            ->first();

        return view('pages.post', [
            'post' => $post,
            'previous' => $previous,
            'next' => $next,
        ]);
    }
}
