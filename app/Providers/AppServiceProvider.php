<?php

namespace App\Providers;

use App\Models\BlogPost;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use League\CommonMark\Extension\Attributes\AttributesExtension;
use League\CommonMark\GithubFlavoredMarkdownConverter;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        /**
         * Get the converter to use for Markdown to HTML.
         *
         * @return \League\CommonMark\GithubFlavoredMarkdownConverter
         */
        $this->app->singleton('markdown', function () {
            $converter = new GithubFlavoredMarkdownConverter;

            $converter->getEnvironment()->addExtension(new AttributesExtension());

            return $converter;
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Route::bind('slug', function ($slug) {
            return BlogPost::where('slug', $slug)->firstOrFail();
        });
    }
}
