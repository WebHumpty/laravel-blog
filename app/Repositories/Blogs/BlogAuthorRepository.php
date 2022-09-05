<?php

namespace App\Repositories\Blogs;

use App\Repositories\CoreRepository;
use App\Models\Blogs\BlogAuthor as Model;

class BlogAuthorRepository extends CoreRepository
{
    /**
     * вернуть имя модели
     */
    protected function getModelClass(): string
    {
        return Model::class;
    }
}
