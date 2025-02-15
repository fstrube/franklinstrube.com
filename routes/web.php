<?php

use App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;

// Frontend routes
Route::get('/', Controllers\HomeController::class)->name('blog.home');
Route::get('/robots.txt', Controllers\RobotsController::class)->name('robots.txt');
Route::get('/sitemap.xml', Controllers\SitemapController::class)->name('sitemap.xml');
Route::get('/blog/{slug}', [Controllers\PostsController::class, 'show'])
    ->name('blog.posts.show');
Route::get('/projects', [Controllers\ProjectsController::class, 'index'])
    ->name('projects');
Route::get('/projects/{project}', [Controllers\ProjectsController::class, 'show'])
    ->name('projects.show');

// Project: Markdown to PDF Converter
Route::get('/markdown-to-pdf', [Controllers\MarkdownToPdfController::class, 'show'])
    ->name('markdown-to-pdf');

// Admin routes
Route::group(
    ['middleware' => 'auth', 'as' => 'admin.', 'prefix' => 'admin'],
    function () {
        Route::get('/', Controllers\Admin\HomeController::class)->name('home');
        Route::resource('posts', Controllers\Admin\PostsController::class)->except('show');
        Route::post('posts/{post}/upload', [Controllers\Admin\PostsController::class, 'upload'])->name('posts.upload');
        Route::resource('tags', Controllers\Admin\TagsController::class);
        Route::get('/user/profile', Controllers\Admin\UserProfileController::class)->name('user-profile');
        Route::get('/settings', Controllers\Admin\SettingsController::class)->name('settings');
    }
);

// Allow GET request to logout controller
Route::get('/admin/logout', [AuthenticatedSessionController::class, 'destroy']);
