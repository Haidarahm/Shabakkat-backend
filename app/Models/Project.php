<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'slug', 'client', 'country', 'year', 'tag', 'color', 'title',
        'challenge', 'scope', 'scale', 'results', 'photo_label',
        'photo_src', 'related_service_href', 'sort_order',
    ];

    protected $casts = [
        'scope' => 'array',
    ];
}
