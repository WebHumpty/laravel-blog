<?php

namespace App\Models\Blogs;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class BlogPost
 * @package App\Models\Blogs
 * @mixin Builder
 */
class BlogPost extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = [
        'blog_category_id',
        'blog_author_id',
        'keywords',
        'description',
        'slug',
        'title',
        'content',
        'thumbnail',
        'is_published',
        'views',
    ];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
