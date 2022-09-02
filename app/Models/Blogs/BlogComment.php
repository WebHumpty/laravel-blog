<?php

namespace App\Models\Blogs;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class BlogComment
 * @package App\Models\Blogs
 * @mixin Builder
 */
class BlogComment extends Model
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

    /**
     * вернуть дату публикации
     */
    public function publishedDate(): string
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at)
            ->format('d, F, Y');
    }
}
