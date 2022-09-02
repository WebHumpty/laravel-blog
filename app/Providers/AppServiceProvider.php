<?php

namespace App\Providers;

use App\Helpers\Viewing;
use App\Models\Blogs\BlogCategory;
use App\Models\Blogs\BlogPost;
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
           $view->with('popularPosts', BlogPost::orderBy('views', 'DESC')
               ->limit(BlogPost::POPULAR_COUNT)
               ->get()
           );

           $postsIds = (Viewing::create())
               ->setKey(Viewing::RECENT_COOKIE_KEY)
               ->getCookieIds();

           $view->with('recentPosts', BlogPost::whereIn('id', $postsIds)
               ->orderBy('views', 'DESC')
               ->limit(BlogPost::RECENT_COUNT)
               ->get()
           );
        });
    }
}
