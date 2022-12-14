<?php

namespace App\Models\Blogs;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Class BlogTag
 * @package App\Models\Blogs
 * @mixin Builder
 */
class BlogTag extends AppModel
{
    use HasFactory, Sluggable;

    protected $fillable = [
        'slug',
        'name'
    ];

    public $timestamps = false;

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
     * вернуть посты тега
     */
    public function blogTagPosts(): BelongsToMany
    {
        return $this->belongsToMany(BlogPost::class);
    }
}
