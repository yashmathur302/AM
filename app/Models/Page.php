<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = [
        'slug',
        'name',
        'meta_title',
        'meta_description',
        'focus_keyword',
        'og_image',
    ];

    public function getOgImageUrlAttribute(): ?string
    {
        return $this->og_image ? asset('storage/'.$this->og_image) : null;
    }

    public static function seo(string $slug): array
    {
        $page = static::where('slug', $slug)->first();

        if (! $page) {
            return [
                'title' => config('app.name'),
                'description' => config('seo.default_description'),
                'keyword' => null,
                'image' => asset(config('seo.default_og_image')),
            ];
        }

        return [
            'title' => $page->meta_title,
            'description' => $page->meta_description,
            'keyword' => $page->focus_keyword,
            'image' => $page->og_image_url ?: asset(config('seo.default_og_image')),
        ];
    }
}
