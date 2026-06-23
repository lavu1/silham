<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CmsPage extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'label',
        'title',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'canonical_url',
        'robots',
        'og_title',
        'og_description',
        'og_image',
        'sitemap_enabled',
    ];

    protected $casts = [
        'sitemap_enabled' => 'boolean',
    ];

    public function fragments()
    {
        return $this->hasMany(CmsFragment::class, 'page_slug', 'slug');
    }
}
