<?php

namespace App\Http\Controllers\Blogs\Frontend;

use App\Models\Blogs\BlogPost;
use Illuminate\View\View;

class BlogPostController extends AppController
{
    /**
     * вернуть страницу постов
     */
    public function index(): View
    {
        $paginator = BlogPost::with('blogCategory', 'blogAuthor')
            ->published()
            ->paginate(BlogPost::CLIENT_PER_PAGE);

        return view('blogs.posts.index', [
            'paginator' => $paginator,
        ]);
    }
}
