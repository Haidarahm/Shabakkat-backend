<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Certification extends Model
{
    protected $fillable = ['code', 'title', 'logo_src', 'sort_order'];
}
