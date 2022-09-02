<?php

namespace App\Models\Blogs;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AppModel extends Model
{
    use HasFactory;

    /**
     * вернуть дату публикации
     */
    public function publishedDate(): string
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at)
            ->format('d, F, Y');
    }

    /**
     * вернуть посты
     */
    public function blogPosts(): HasMany
    {
        return $this->hasMany(BlogPost::class);
    }

    /**
     * настройте область запроса, включить в запрос авторов и категории
     */
    public function scopeCategoryAndAuthor(Builder $query): Builder
    {
        return $query->with('blogAuthor', 'blogCategory');
    }
}
