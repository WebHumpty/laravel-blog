<?php

namespace App\Http\Controllers\Blogs\Frontend;

use App\Models\Blogs\BlogCategory;
use App\Models\Blogs\BlogPost;
use Illuminate\View\View;

class BlogCategoryController extends AppController
{
    /**
     * верунть страницу постов категории
     */
    public function show(string $slug): View
    {
        $item = BlogCategory::select('id', 'slug', 'name')
            ->where('slug', $slug)
            ->where('is_active', true)
            ->first();

        $paginator = $item->blogPosts()
            ->with('blogCategory', 'blogAuthor')
            ->published()
            ->orderBy('id', 'DESC')
            ->paginate(BlogPost::CLIENT_PER_PAGE);

        return view('blogs.categories.show', [
            'item' => $item,
            'paginator' => $paginator,
        ]);
    }
}
