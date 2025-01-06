<?php
namespace App\Http\Controllers;

use App\Models\BlogPost;

class HomeController extends Controller
{
    public function index()
    {
        return view('pages.home', [
            'posts' => BlogPost::query()->orderBy('published_at', 'desc')->get(),
        ]);
    }
}