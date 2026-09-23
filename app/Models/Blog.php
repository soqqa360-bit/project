<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Spatie\Translatable\HasTranslations;

class Blog extends Model
{

    use SoftDeletes, HasTranslations;

    public $translatable = ['title', 'content'];

    protected $fillable = ['title', 'content', 'image', 'user_id', 'category_id', 'views', 'slug'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function getReadingTimeAttribute(): string
    {
        $wordCount = str_word_count(strip_tags($this->content));

        $minutes = ceil($wordCount / 100);

        if ($minutes < 1) {
            $minutes = 1;
        }

        return $minutes . ' Daqiqa';
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($blog) {
            $titles = $blog->getTranslations('title');
            $titleSlug = $titles['uz'] ?? reset($titles) ?: 'maqola';
            $blog->slug = static::generatedUniqueSlug($titleSlug);
        });
        static::updating(function ($blog) {
            if ($blog->isDirty('title')) {
                $titles = $blog->getTranslations('title');
                $titleSlug = $titles['uz'] ?? reset($titles) ?: 'maqola';
                $blog->slug = static::generatedUniqueSlug($titleSlug, $blog->id);
            }
        });
    }

    protected static function generatedUniqueSlug(string $title, ?int $id = null): string
    {
        $slug = Str::slug($title);

        if (empty($slug)) {
            $slug = Str::random(8);
        }

        $originalSlug = $slug;
        $counter = 1;

        // Xatolik to'g'rilangan joyi:
        while (static::where('slug', $slug)->when($id, fn($a) => $a->where('id', '!=', $id))->exists()) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        return $slug;
    }
}
