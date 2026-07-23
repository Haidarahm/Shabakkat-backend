<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeaturedProject extends Model
{
    protected $fillable = ['photo_label', 'photo_src', 'title', 'description', 'href', 'sort_order'];
}
