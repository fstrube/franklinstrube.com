<?php
namespace App\Http\Controllers;

use App\Models\BlogPost;

class PostsController extends Controller
{
    public function show(BlogPost $post)
    {
        return 'found';
    }
}
