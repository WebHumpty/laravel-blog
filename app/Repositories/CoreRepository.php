<?php

namespace App\Repositories;

use App\Models\Blogs\BlogTag;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Pagination\LengthAwarePaginator;

abstract class CoreRepository
{
    /** @var Model  */
    protected Model $model;

    /**
     * CoreRepository constructor.
     */
    public function __construct()
    {
        $this->model = app($this->getModelClass());
    }

    /**
     * вернуть имя модели
     */
    abstract protected function getModelClass(): string;

    /**
     * вернуть клонированную копию модели
     */
    protected function startConditions(): Model
    {
        return clone $this->model;
    }

    /**
     * вернуть одну запись по чпу
     */
    public function findBySlug(string $slug): ?Model
    {
        $item = $this->startConditions()
            ->where('slug', $slug)
            ->first();

        if (!$item) {
            return null;
        }

        return $item;
    }

    /**
     * вернуть одну запись по ID
     */
    public function findById(int $id): ?Model
    {
        $item = $this->startConditions()
            ->find($id);

        if (!$item) {
            return null;
        }

        return $item;
    }

    /**
     * вернуть все посты
     */
    public function getAllWithPaginate(int $perPage, bool $isPublished = true, ?Model $item = null): LengthAwarePaginator
    {
        $query = $this
            ->getQueryModel($item)
            ->categoryAndAuthor();

        if ($isPublished) {
            $query->published();
        }

        $paginator = $query
            ->orderBy('id', 'DESC')
            ->paginate($perPage);

        return $paginator;
    }


    /**
     * @param Model|null $item
     * @return Model|BelongsToMany
     */
    private function getQueryModel(Model $item = null)
    {
        if (!empty($item) && ($item instanceof BlogTag)) {
            return $item->blogTagPosts();
        } elseif (!empty($item)) {
            return $item->blogPosts();
        }

        return $this->startConditions();
    }
}
