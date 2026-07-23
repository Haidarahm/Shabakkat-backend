<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ServiceCategory extends Model
{
    protected $fillable = [
        'slug', 'index_label', 'title', 'description', 'sort_order',
    ];

    public function services(): HasMany
    {
        return $this->hasMany(Service::class, 'category_slug', 'slug')->orderBy('sort_order');
    }
}
