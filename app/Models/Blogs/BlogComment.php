<?php

namespace App\Models\Blogs;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class BlogComment
 * @package App\Models\Blogs
 * @mixin Builder
 */
class BlogComment extends AppModel
{
    use HasFactory;

    protected $fillable = [
        'parent_id',
        'user_id',
        'blog_post_id',
        'name',
        'email',
        'comment',
        'is_active',
    ];
}
