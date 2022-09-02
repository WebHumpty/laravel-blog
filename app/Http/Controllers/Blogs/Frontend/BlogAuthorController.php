<?php

namespace App\Http\Controllers\Blogs\Frontend;

use App\Models\Blogs\BlogAuthor;
use App\Models\Blogs\BlogPost;
use Illuminate\View\View;

class BlogAuthorController extends AppController
{
    /**
     * вернуть страницу постов автора с пагинацией
     */
    public function show(string $slug): View
    {
        $item = BlogAuthor::select('id', 'slug', 'name')
            ->where('slug', $slug)
            ->first();

        if (!$item) {
            abort(404);
        }

        $paginator = $item->blogPosts()
            ->categoryAndAuthor()
            ->published()
            ->orderBy('id', 'DESC')
            ->paginate(BlogPost::CLIENT_PER_PAGE);

        return view('blogs.authors.show', [
            'item' => $item,
            'paginator' => $paginator,
        ]);
    }
}
