<?php

namespace App\Models\Blogs;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class BlogAuthor
 * @package App\Models\Blogs
 * @mixin Builder
 */
class BlogAuthor extends Model
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

    /**
     * вернуть посты автора
     */
    public function blogPosts(): HasMany
    {
        return $this->hasMany(BlogPost::class);
    }
}
