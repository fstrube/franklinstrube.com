<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class MarkdownToPdfController extends Controller
{
    const DEFAULT_MARKDOWN = <<<MD
MD;

    /**
     * Display the resource.
     */
    public function show()
    {
        Inertia::setRootView('layouts.inertia');

        return inertia('MarkdownToPdf', [
            'markdown' => $request->markdown ?? static::DEFAULT_MARKDOWN,
        ]);
    }
}
