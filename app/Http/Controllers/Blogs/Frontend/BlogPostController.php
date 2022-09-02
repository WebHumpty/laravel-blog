<?php

namespace App\Http\Controllers\Blogs\Frontend;

use App\Models\Blogs\BlogPost;
use Illuminate\Http\Request;
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

    /**
     * вернуть страницу поста
     */
    public function show(string $slug): View
    {
        $item = BlogPost::where('slug', $slug)
            ->first();

        if (!$item) {
            abort(404);
        }

        $previousPost = $item->select('id','slug', 'title', 'thumbnail')
            ->where('blog_category_id', $item->blog_category_id)
            ->where('id', '<', $item->id)
            ->orderBy('id', 'DESC')
            ->limit(1)
            ->first();

        $nextPost = $item->select('id', 'slug', 'title', 'thumbnail')
            ->where('blog_category_id', $item->blog_category_id)
            ->where('id', '>', $item->id)
            ->limit(1)
            ->first();

        $postsCarousel = $item->limit(BlogPost::POST_CAROUSEL)->get();

        return view('blogs.posts.show', [
            'item' => $item,
            'previousPost' => $previousPost,
            'nextPost' => $nextPost,
            'postsCarousel' => $postsCarousel,
        ]);
    }

    /**
     * вернуть страницу поика постов
     */
    public function search(Request $request): View
    {
        $search = "%{$request->input('search')}%";

        $paginator = BlogPost::with('blogCategory', 'blogAuthor')
            ->where('title', 'LIKE', $search)
            ->orWhere('content', 'LIKE', $search)
            ->published()
            ->paginate(BlogPost::CLIENT_PER_PAGE)
            ->withQueryString();

        return view('blogs.posts.search', [
            'paginator' => $paginator,
        ]);
    }
}
