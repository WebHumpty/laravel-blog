<?php

namespace App\Providers;

use App\Helpers\Viewing;
use App\Models\Blogs\BlogCategory;
use App\Models\Blogs\BlogPost;
use App\Repositories\Blogs\BlogPostRepository;
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

           $blogPostRepository = app(BlogPostRepository::class);

           $view->with('popularPosts', $blogPostRepository->getPopularPosts(BlogPost::POPULAR_COUNT));

           $view->with('recentPosts', $blogPostRepository->getRecentPosts(BlogPost::RECENT_COUNT));
        });
    }
}
