<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JobApplication extends Model
{
    protected $fillable = [
        'opening_id',
        'opening_title',
        'name',
        'email',
        'phone',
        'linkedin',
        'portfolio',
        'cover_letter',
        'cv_path',
        'cv_original_name',
        'status',
        'ip_address',
    ];

    public function opening(): BelongsTo
    {
        return $this->belongsTo(Opening::class);
    }
}
