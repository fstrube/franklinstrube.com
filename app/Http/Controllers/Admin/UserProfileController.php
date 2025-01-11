<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class UserProfileController extends Controller
{
    public function __invoke()
    {
        return 'profile';
    }
}