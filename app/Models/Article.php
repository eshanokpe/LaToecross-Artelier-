<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'content',
        'image',
        'category',
        'author',
        'published_at',
        'is_published',
        'views',
        'comments_count',
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'is_published' => 'boolean',
        'views' => 'integer',
        'comments_count' => 'integer',
    ];

    protected static function booted(): void
    {
        static::creating(function (Article $article): void {
            if (filled($article->slug)) {
                return;
            }

            $baseSlug = Str::slug($article->title);
            $slug = $baseSlug;
            $counter = 2;

            while (static::where('slug', $slug)->exists()) {
                $slug = "{$baseSlug}-{$counter}";
                $counter++;
            }

            $article->slug = $slug;
        });

        // Auto-generate excerpt if not provided
        static::creating(function (Article $article): void {
            if (empty($article->excerpt) && !empty($article->content)) {
                $article->excerpt = Str::limit(strip_tags($article->content), 150);
            }
        });

        // Set published_at when publishing
        static::updating(function (Article $article): void {
            if ($article->isDirty('is_published') && $article->is_published && empty($article->published_at)) {
                $article->published_at = now();
            }
        });
    }

    /**
     * Get the route key for the model.
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Get the URL for the article.
     */
    public function getUrlAttribute()
    {
        return route('article.show', $this->slug);
    }

    /**
     * Get the formatted published date.
     */
    public function getFormattedDateAttribute()
    {
        return $this->published_at ? $this->published_at->format('F j, Y') : null;
    }

    /**
     * Get the short excerpt.
     */
    public function getShortExcerptAttribute()
    {
        return Str::limit(strip_tags($this->excerpt ?? $this->content ?? ''), 120);
    }

    /**
     * Scope a query to only include published articles.
     */
    public function scopePublished($query)
    {
        return $query->where('is_published', true)
            ->where('published_at', '<=', now());
    }

    /**
     * Scope a query to order by latest published.
     */
    public function scopeLatestPublished($query)
    {
        return $query->published()->orderBy('published_at', 'desc');
    }

    /**
     * Scope a query to filter by category.
     */
    public function scopeByCategory($query, $category)
    {
        if ($category && $category !== 'all') {
            return $query->where('category', $category);
        }
        return $query;
    }

    /**
     * Increment the view count.
     */
    public function incrementViews()
    {
        $this->increment('views');
    }
}