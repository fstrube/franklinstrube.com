<?php

namespace App\Http\Controllers;

class RobotsController extends Controller
{
    public function __invoke()
    {
        return response(view('robots'), 200, ['Content-Type' => 'text/plain']);
    }
}
