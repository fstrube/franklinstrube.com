<?php
namespace App\Http\Controllers;

use App\Models\BlogPost;

class HomeController extends Controller
{
    public function __invoke()
    {
        return view('pages.home', [
            'posts' => BlogPost::published()->orderBy('published_at', 'desc')->get(),
            'asides' => [],
        ]);
    }
}
