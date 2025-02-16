<?php

namespace App\Http\Controllers\Tools;

use App\Http\Controllers\Controller;
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
        Inertia::setRootView('tools.markdown-to-pdf');

        return inertia('MarkdownToPdf', [
            'markdown' => $request->markdown ?? static::DEFAULT_MARKDOWN,
        ]);
    }
}
