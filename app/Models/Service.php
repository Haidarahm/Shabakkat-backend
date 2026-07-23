<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Service extends Model
{
    protected $fillable = [
        'slug', 'category_slug', 'index_label', 'eyebrow', 'title',
        'description', 'capabilities', 'photo_label', 'photo_src',
        'image_side', 'sort_order',
    ];

    protected $casts = [
        'capabilities' => 'array',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(ServiceCategory::class, 'category_slug', 'slug');
    }
}
