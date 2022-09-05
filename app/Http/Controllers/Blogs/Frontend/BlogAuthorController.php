<?php

namespace App\Http\Controllers\Blogs\Frontend;

use App\Models\Blogs\BlogPost;
use App\Repositories\Blogs\BlogAuthorRepository;
use Illuminate\View\View;

class BlogAuthorController extends AppController
{
    private BlogAuthorRepository $blogAuthorRepository;

    public function __construct()
    {
        parent::__construct();

        $this->blogAuthorRepository = app(BlogAuthorRepository::class);
    }

    /**
     * вернуть страницу постов автора с пагинацией
     */
    public function show(string $slug): View
    {
        $item = $this->blogAuthorRepository
            ->findBySlug($slug);

        if (!$item) {
            abort(404);
        }

        $paginator = $this->blogAuthorRepository
            ->getAllWithPaginate(
                BlogPost::CLIENT_PER_PAGE,
                true,
                $item
            );

        return view('blogs.authors.show', [
            'item' => $item,
            'paginator' => $paginator,
        ]);
    }
}
