<?php

namespace App\Http\Controllers\Blogs\Frontend;

use App\Models\Blogs\BlogPost;
use App\Repositories\Blogs\BlogTagRepository;
use Illuminate\View\View;

class BlogTagController extends AppController
{
    private BlogTagRepository $blogTagRepository;

    public function __construct()
    {
        parent::__construct();

        $this->blogTagRepository = app(BlogTagRepository::class);
    }

    /**
     * вернуть страницу постов тега
     */
    public function show(string $slug): View
    {
        $item = $this->blogTagRepository
            ->findBySlug($slug);

        if (!$item) {
            abort(404);
        }

        $paginator = $this->blogTagRepository
            ->getAllWithPaginate(
                BlogPost::CLIENT_PER_PAGE,
                true,
                $item
            );

        return view('blogs.tags.show', [
            'item' => $item,
            'paginator' => $paginator,
        ]);
    }
}
