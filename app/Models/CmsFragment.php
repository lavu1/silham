<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CmsFragment extends Model
{
    use HasFactory;

    protected $fillable = [
        'page_slug',
        'fragment_key',
        'type',
        'content',
    ];

    public function page()
    {
        return $this->belongsTo(CmsPage::class, 'page_slug', 'slug');
    }

    public static function getValue(string $pageSlug, string $fragmentKey, mixed $default = null): mixed
    {
        $value = static::where('page_slug', $pageSlug)
            ->where('fragment_key', $fragmentKey)
            ->value('content');

        return $value === null ? $default : $value;
    }
}
