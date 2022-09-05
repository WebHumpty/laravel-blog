<?php

namespace App\Repositories\Blogs;

use App\Repositories\CoreRepository;
use App\Models\Blogs\BlogCategory as Model;

class BlogCategoryRepository extends CoreRepository
{
    /**
     * вернуть имя модели
     */
    protected function getModelClass(): string
    {
        return Model::class;
    }
}
