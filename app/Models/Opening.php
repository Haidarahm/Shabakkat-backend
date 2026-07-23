<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Opening extends Model
{
    protected $fillable = [
        'title',
        'department',
        'location',
        'type',
        'is_active',
        'closes_at',
        'sort_order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'closes_at' => 'datetime',
    ];

    public function applications(): HasMany
    {
        return $this->hasMany(JobApplication::class);
    }

    public function isCurrentlyOpen(): bool
    {
        if (! $this->is_active) {
            return false;
        }

        if ($this->closes_at === null) {
            return true;
        }

        return $this->closes_at->isFuture();
    }

    public function scopeCurrentlyOpen(Builder $query): Builder
    {
        return $query
            ->where('is_active', true)
            ->where(function (Builder $q) {
                $q->whereNull('closes_at')
                    ->orWhere('closes_at', '>', now());
            });
    }

    /**
     * Mark openings past their closes_at date as inactive.
     */
    public static function deactivateExpired(): int
    {
        return static::query()
            ->where('is_active', true)
            ->whereNotNull('closes_at')
            ->where('closes_at', '<=', now())
            ->update(['is_active' => false]);
    }
}
