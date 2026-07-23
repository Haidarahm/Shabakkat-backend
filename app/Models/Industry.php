<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Industry extends Model
{
    protected $fillable = [
        'slug', 'title', 'tagline', 'color', 'summary', 'notable_names',
        'focus_areas', 'relevant_services', 'related_project_href', 'sort_order',
    ];

    protected $casts = [
        'focus_areas' => 'array',
        'relevant_services' => 'array',
    ];
}
