<?php

namespace App\Repositories\Blogs;

use App\Repositories\CoreRepository;
use App\Models\Blogs\BlogTag as Model;

class BlogTagRepository extends CoreRepository
{
    /**
     * вернуть имя модели
     */
    protected function getModelClass(): string
    {
        return Model::class;
    }
}
