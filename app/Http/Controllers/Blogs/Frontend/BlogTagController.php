<?php

namespace App\Http\Controllers\Blogs\Frontend;

use App\Models\Blogs\BlogPost;
use App\Models\Blogs\BlogTag;
use Illuminate\View\View;

class BlogTagController extends AppController
{
    /**
     * вернуть страницу постов тега
     */
    public function show(string $slug): View
    {
        $item = BlogTag::select('id', 'slug', 'name')
            ->where('slug', $slug)
            ->first();

        if (!$item) {
            abort(404);
        }

        $paginator = $item->blogTagPosts()
            ->with('blogCategory', 'blogAuthor')
            ->published()
            ->orderBy('id', 'DESC')
            ->paginate(BlogPost::CLIENT_PER_PAGE);

        return view('blogs.tags.show', [
            'item' => $item,
            'paginator' => $paginator,
        ]);
    }
}
