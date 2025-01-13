<?php

namespace App\Http\Controllers\Admin;

use App\Actions;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateBlogPost;
use App\Http\Requests\UploadFile;
use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{
    /**
     * GET /admin/posts/create
     */
    public function create()
    {
        return view('admin.posts.edit', ['post' => new BlogPost]);
    }

    /**
     * GET /admin/posts/{post}/edit
     *
     *
     * @return \Illuminate\View\View
     */
    public function edit(BlogPost $post)
    {
        return view('admin.posts.edit', ['post' => $post]);
    }

    /**
     * GET /admin/posts
     *
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $query = BlogPost::query()->with('tags')->orderBy('published_at', 'desc');
        $query->search($request->q);

        return view(
            'admin.posts.index',
            [
                'posts' => $query->paginate(),
            ]
        );
    }

    /**
     * POST /admin/posts
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function store(UpdateBlogPost $request)
    {
        if ($post = (new Actions\UpdateBlogPost)->update(new BlogPost, $request)) {
            session()->flash(
                'notification',
                [
                    'type' => 'success',
                    'message' => 'Saved!',
                ]
            );
        }

        return response()->redirectToRoute('admin.posts.edit', $post);
    }

    /**
     * PUT /admin/posts/{post}
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBlogPost $request, BlogPost $post)
    {
        if ((new Actions\UpdateBlogPost)->update($post, $request)) {
            session()->flash(
                'notification',
                [
                    'type' => 'success',
                    'message' => 'Saved!',
                ]
            );
        }

        return response()->redirectToRoute('admin.posts.edit', $post);
    }

    /**
     * POST /admin/posts/{post}/upload
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function upload(UploadFile $request, BlogPost $post)
    {
        $path = $request->file->storePublicly(
            'posts/'.$post->id,
            [
                'disk' => 'public',
            ]
        );

        return response(
            [
                'name' => $request->file->getClientOriginalName(),
                'path' => $path,
                'url' => Storage::url($path),
            ]
        );
    }
}
