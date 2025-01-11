<?php

use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\PostsController as AdminPostsController;
use App\Http\Controllers\Admin\TagsController as AdminTagsController;
use App\Http\Controllers\Admin\UserProfileController;
use App\Http\Controllers\Admin\SettingsController as AdminSettingsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProjectsController;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;

// Frontend routes
Route::get('/', HomeController::class)->name('home');
Route::get('/post/{slug}', [PostsController::class, 'show'])->name('posts.show');
Route::get('/projects', ProjectsController::class)->name('projects');

// Admin routes
Route::group(['middleware' => 'auth', 'as' => 'admin.', 'prefix' => 'admin'], function() {
    Route::get('/', AdminHomeController::class)->name('home');
    Route::resource('posts', AdminPostsController::class)->except('show');
    Route::resource('tags', AdminTagsController::class);
    Route::get('/user/profile', UserProfileController::class)->name('user-profile');
    Route::get('/settings', AdminSettingsController::class)->name('settings');
});

// Allow GET request to logout controller
Route::get('/admin/logout', [AuthenticatedSessionController::class, 'destroy']);
