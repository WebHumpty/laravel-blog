<?php

namespace App\Repositories\Blogs;

use App\Repositories\CoreRepository;
use App\Models\Blogs\BlogCategory as Model;
use Illuminate\Database\Eloquent\Collection;

class BlogCategoryRepository extends CoreRepository
{
    /**
     * вернуть имя модели
     */
    protected function getModelClass(): string
    {
        return Model::class;
    }

    /**
     * вернуть категорию
     */
    public function getCategoryBySlug(string $slug): ?Model
    {
        $item = $this->startConditions()
            ->select('id', 'slug', 'name')
            ->where('slug', $slug)
            ->where('is_active', true)
            ->first();

        return $item;
    }

    /**
     * вернуть все каегории для вывода в меню
     */
    public function getComboBoxCategories(): Collection
    {
        $categoriesList = $this->startConditions()
            ->with('blogPosts')
            ->get();

        return $categoriesList;
    }
}
