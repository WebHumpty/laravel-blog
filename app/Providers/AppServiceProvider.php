<?php

namespace App\Providers;

use App\Models\Blogs\BlogCategory;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('blogs.blocks._sidebar', function ($view) {
           $view->with('categoriesList', BlogCategory::with('blogPosts')->get());
        });
    }
}
