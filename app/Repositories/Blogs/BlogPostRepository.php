<?php

namespace App\Repositories\Blogs;

use App\Repositories\CoreRepository;
use App\Models\Blogs\BlogPost as Model;

class BlogPostRepository extends CoreRepository
{
    /**
     * вернуть имя модели
     */
    protected function getModelClass(): string
    {
        return Model::class;
    }
}
