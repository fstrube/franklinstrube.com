<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;

class HomeController extends Controller
{
    /**
     * GET /
     *
     * @return \Illuminate\View\View
     */
    public function __invoke()
    {
        $context = [
            'posts' => BlogPost::published()->orderBy('published_at', 'desc')->limit(10)->get(),
            'asides' => [],
        ];

        return view('pages.home', $context);
    }
}
