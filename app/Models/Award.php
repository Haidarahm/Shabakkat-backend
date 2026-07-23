<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Award extends Model
{
    protected $fillable = ['year', 'label', 'sort_order'];

    protected $casts = [
        'year' => 'integer',
    ];
}
