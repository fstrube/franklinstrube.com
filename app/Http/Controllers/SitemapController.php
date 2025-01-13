<?php

namespace App\Http\Controllers;

class SitemapController extends Controller
{
    public function __invoke()
    {
        return response(view('sitemap'), 200, ['Content-Type' => 'text/xml']);
    }
}
