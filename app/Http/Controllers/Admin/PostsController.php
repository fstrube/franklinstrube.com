<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{
    /**
     * GET /admin/posts/{post}/edit
     *
     * @param \App\Models\BlogPost $post
     */
    public function edit(BlogPost $post)
    {
        return view('admin.posts.edit', ['post' => $post]);
    }

    /**
     * GET /admin/posts
     *
     * @param \Illuminate\Http\Request $request
     */
    public function index(Request $request)
    {
        $query = BlogPost::query()->orderBy('created_at', 'desc');
        $query->search($request->q);

        return view('admin.posts.index', [
            'posts' => $query->paginate(),
        ]);
    }

    /**
     * PUT /admin/posts/{post}
     * 
     * @param \Illuminate\Http\Request $request
     */
    public function update(Request $request, BlogPost $post)
    {
        DB::transaction(function () use ($request, $post) {
            $post->title = $request->title;
            $post->slug = $request->slug;
            $post->content = $request->content;

            $post->save();

            $tags = collect($request->tags)->sort();

            Tag::insertOrIgnore($tags->map(function ($tagName) {
                return ['name' => $tagName];
            })->values()->all());

            $query = Tag::whereIn('name', $request->tags)->orderBy('name', 'asc');
            $post->tags()->sync($query->pluck('id'));
        });

        return response()->redirectToRoute('admin.posts.edit', $post);
    }
}
