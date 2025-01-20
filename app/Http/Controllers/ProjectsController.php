<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class ProjectsController extends Controller
{
    /**
     * GET /projects
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('pages.projects', [ 'asides' => [] ]);
    }

    /**
     * GET /projects/{project}
     *
     * @return \Illuminate\View\View
     */
    public function show(Request $request, $project)
    {
        $view = 'pages.projects.' . strtolower($project);

        if (!View::exists($view)) {
            abort(404);
        }

        return view($view);
    }
}
