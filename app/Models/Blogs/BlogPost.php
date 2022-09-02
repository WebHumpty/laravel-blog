<?php

namespace App\Models\Blogs;

use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

/**
 * Class BlogPost
 * @package App\Models\Blogs
 * @mixin Builder
 */
class BlogPost extends Model
{
    use HasFactory, Sluggable;

    public const CLIENT_PER_PAGE = 10;
    public const ADMIN_REP_PAGE = 10;

    public const MINI_DESCRIPTION = 300;

    public const POST_CAROUSEL = 6;

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

    /**
     * вернуть путь изображения поста
     */
    public function getImage(): ?string
    {
        if ($this->thumbnail) {
            $imagePath = asset("/uploads/{$this->thumbnail}");
        }

        return $imagePath ?? null;
    }

    /**
     * вернуть мини описание текста
     */
    public function miniDescription(): string
    {
        return Str::limit($this->content, self::MINI_DESCRIPTION, '...');
    }

    /**
     * вернуть дату публикации
     */
    public function publishedDate(): string
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at)
            ->format('d, F, Y');
    }
}
