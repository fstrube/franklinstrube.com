<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Tag;

class TagsController extends Controller
{
    public function show(Tag $tag)
    {
        return view('pages.tag', [
            'tag' => $tag,
        ]);
    }
}
