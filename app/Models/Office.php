<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    protected $fillable = [
        'name', 'role', 'color', 'address', 'phone', 'photo_src',
        'is_headquarters', 'map_cx', 'map_cy', 'sort_order',
    ];

    protected $casts = [
        'is_headquarters' => 'boolean',
        'map_cx' => 'float',
        'map_cy' => 'float',
    ];
}
