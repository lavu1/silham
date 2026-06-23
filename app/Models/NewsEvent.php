<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class NewsEvent extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'type',
        'image',
        'excerpt',
        'body',
        'starts_at',
        'ends_at',
        'time_text',
        'location',
        'price',
        'registration_url',
        'is_featured',
        'is_published',
        'sort_order',
        'meta_title',
        'meta_description',
    ];

    protected $casts = [
        'starts_at' => 'date',
        'ends_at' => 'date',
        'is_featured' => 'boolean',
        'is_published' => 'boolean',
    ];

    protected static function booted(): void
    {
        static::saving(function (NewsEvent $event): void {
            if (blank($event->slug)) {
                $event->slug = Str::slug($event->title);
            }
        });
    }

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('is_published', true);
    }

    public function publicUrl(): string
    {
        return route('news-events.show', $this);
    }

    public function dateLabel(): ?string
    {
        if (! $this->starts_at) {
            return null;
        }

        if ($this->ends_at && ! $this->starts_at->isSameDay($this->ends_at)) {
            if ($this->starts_at->isSameMonth($this->ends_at) && $this->starts_at->isSameYear($this->ends_at)) {
                return $this->starts_at->format('jS F').' - '.$this->ends_at->format('jS F, Y');
            }

            if ($this->starts_at->isSameYear($this->ends_at)) {
                return $this->starts_at->format('jS F').' - '.$this->ends_at->format('jS F, Y');
            }

            return $this->starts_at->format('jS F, Y').' - '.$this->ends_at->format('jS F, Y');
        }

        return $this->starts_at->format('jS F, Y');
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
