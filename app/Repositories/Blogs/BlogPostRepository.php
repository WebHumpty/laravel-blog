<?php

namespace App\Repositories\Blogs;

use App\Helpers\Viewing;
use App\Models\Blogs\BlogPost;
use App\Repositories\CoreRepository;
use App\Models\Blogs\BlogPost as Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class BlogPostRepository extends CoreRepository
{
    /**
     * вернуть имя модели
     */
    protected function getModelClass(): string
    {
        return Model::class;
    }

    /**
     * вернуть посты для карусели
     */
    public function getPostsCarousel(int $limit): Collection
    {
        $postsList = $this->startConditions()
            ->published()
            ->limit($limit)
            ->get();

        return $postsList;
    }

    /**
     * вернуть предыдущий пост
     */
    public function getPreviousPost(Model $item): ?Model
    {
        $item = $item->select('slug', 'title', 'thumbnail')
            ->where('blog_category_id', $item->blog_category_id)
            ->where('id', '<', $item->id)
            ->limit(1)
            ->orderBy('id', 'DESC')
            ->first();

        return $item;
    }

    /**
     * вернуть следующий пост
     */
    public function getNextPost(Model $item): ?Model
    {
        $item = $item->select('slug', 'title', 'thumbnail')
            ->where('blog_category_id', $item->blog_category_id)
            ->where('id', '>', $item->id)
            ->limit(1)
            ->first();

        return $item;
    }

    /**
     * добавить просмотр посту
     */
    public function recordView(Model $item): void
    {
        $item->recordViewPost();

        (Viewing::create())
            ->init($item->id, BlogPost::RECENT_COUNT)
            ->addView();
    }

    /**
     * вернуть найденные посты
     */
    public function search(string $search): LengthAwarePaginator
    {
        $postsList = $this->startConditions()
            ->categoryAndAuthor()
            ->searchQuery($search)
            ->published()
            ->paginate(BlogPost::CLIENT_PER_PAGE)
            ->withQueryString();

        return $postsList;
    }

    /**
     * вернуть просмотренные посты
     */
    public function getRecentPosts(int $limit): Collection
    {
        $postsIds = (Viewing::create())
            ->setKey(Viewing::RECENT_COOKIE_KEY)
            ->getCookieIds();

        $postsList = $this->startConditions()
            ->select('slug', 'title', 'thumbnail', 'created_at')
            ->whereIn('id', $postsIds)
            ->limit($limit)
            ->get();

        return $postsList;
    }

    /**
     * вернуть популярные посты
     */
    public function getPopularPosts(int $limit): Collection
    {
        $postsList = $this->startConditions()
            ->select('slug', 'title', 'thumbnail', 'created_at')
            ->orderBy('id', 'DESC')
            ->limit($limit)
            ->get();

        return $postsList;
    }
}
