<?php

namespace App\Http\Controllers\Blogs\Frontend;

use App\Models\Blogs\BlogPost;
use App\Repositories\Blogs\BlogPostRepository;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BlogPostController extends AppController
{
    /** @var BlogPostRepository  */
    private BlogPostRepository $blogPostRepository;

    /**
     * BlogPostController constructor.
     */
    public function __construct()
    {
        parent::__construct();

        $this->blogPostRepository = app(BlogPostRepository::class);
    }

    /**
     * вернуть страницу постов
     */
    public function index(): View
    {
        $paginator = $this->blogPostRepository
            ->getAllWithPaginate(BlogPost::CLIENT_PER_PAGE);

        return view('blogs.posts.index', [
            'paginator' => $paginator,
        ]);
    }

    /**
     * вернуть страницу поста
     */
    public function show(string $slug): View
    {
        $item = $this->blogPostRepository
            ->findBySlug($slug);

        if (!$item) {
            abort(404);
        }

        $previousPost = $this->blogPostRepository
            ->getPreviousPost($item);

        $nextPost = $this->blogPostRepository
            ->getNextPost($item);

        $postsCarousel = $this->blogPostRepository
            ->getPostsCarousel(BlogPost::POST_CAROUSEL);

        $this->blogPostRepository
            ->recordView($item);

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

        $paginator = $this->blogPostRepository
            ->search($search);

        return view('blogs.posts.search', [
            'paginator' => $paginator,
        ]);
    }
}
