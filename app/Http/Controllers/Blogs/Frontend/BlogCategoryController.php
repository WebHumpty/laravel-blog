<?php

namespace App\Http\Controllers\Blogs\Frontend;

use App\Models\Blogs\BlogPost;
use App\Repositories\Blogs\BlogCategoryRepository;
use Illuminate\View\View;

class BlogCategoryController extends AppController
{
    private BlogCategoryRepository $blogCategoryRepository;

    public function __construct()
    {
        parent::__construct();

        $this->blogCategoryRepository = app(BlogCategoryRepository::class);
    }

    /**
     * верунть страницу постов категории
     */
    public function show(string $slug): View
    {
        $item = $this->blogCategoryRepository
            ->getCategoryBySlug($slug);

        if (!$item) {
            abort(404);
        }

        $paginator = $this->blogCategoryRepository
            ->getAllWithPaginate(
                BlogPost::CLIENT_PER_PAGE,
                true,
                $item
            );

        return view('blogs.categories.show', [
            'item' => $item,
            'paginator' => $paginator,
        ]);
    }
}
