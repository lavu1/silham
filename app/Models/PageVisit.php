<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageVisit extends Model
{
    use HasFactory;

    protected $fillable = [
        'page_slug',
        'path',
        'route_name',
        'ip_hash',
        'user_agent',
        'referrer',
        'visited_at',
    ];

    public $timestamps = true;

    protected $casts = [
        'visited_at' => 'datetime',
    ];
}
