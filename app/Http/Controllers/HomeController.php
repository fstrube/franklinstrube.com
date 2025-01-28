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
            'posts' => BlogPost::published()
                ->where('published_at', '<=', now())
                ->orderBy('published_at', 'desc')
                ->get(),
            'asides' => [],
        ];

        return view('pages.home', $context);
    }
}
