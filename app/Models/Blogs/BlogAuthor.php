<?php

namespace App\Models\Blogs;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class BlogAuthor
 * @package App\Models\Blogs
 * @mixin Builder
 */
class BlogAuthor extends AppModel
{
    use HasFactory, Sluggable;

    protected $fillable = [
        'slug',
        'name',
        'email',
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
                'source' => 'name'
            ]
        ];
    }
}
