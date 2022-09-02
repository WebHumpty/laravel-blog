<?php

namespace App\Models\Blogs;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    /**
     * вернуть категорию поста
     */
    public function blogCategory(): BelongsTo
    {
        return $this->belongsTo(BlogCategory::class);
    }

    /**
     * вернуть автора поста
     */
    public function blogAuthor(): BelongsTo
    {
        return $this->belongsTo(BlogAuthor::class);
    }

    /**
     * вернуть теги поста
     */
    public function blogTags(): BelongsToMany
    {
        return $this->belongsToMany(BlogTag::class);
    }

    /**
     * вернуть комментарии поста
     */
    public function blogComments(): HasMany
    {
        return $this->hasMany(BlogComment::class);
    }

    /**
     * включить в область запроса, только опубликованные посты
     */
    public function scopePublished(Builder $query): Builder
    {
        return $query->where('is_published', true);
    }
}
