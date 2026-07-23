<?php

namespace App\Support;

use Illuminate\Support\Str;

class MediaUrl
{
    /**
     * Resolve a stored media path for API / frontend consumption.
     *
     * Uploaded files are returned as same-origin `/storage/...` paths so the
     * Next.js frontend can proxy them (and next/image can optimize them).
     * Legacy frontend assets under `/images/...` are left unchanged.
     */
    public static function public(?string $path): ?string
    {
        if ($path === null || $path === '') {
            return null;
        }

        if (Str::startsWith($path, ['http://', 'https://', '//'])) {
            // Normalize absolute storage URLs back to a relative /storage path
            // so the frontend proxy + next/image optimizer can handle them.
            $storagePos = strpos($path, '/storage/');
            if ($storagePos !== false) {
                return substr($path, $storagePos);
            }

            return $path;
        }

        // Legacy paths served from the Next.js /public folder.
        if (Str::startsWith($path, '/images/')) {
            return $path;
        }

        if (Str::startsWith($path, '/storage/')) {
            return $path;
        }

        // Disk-relative path from Filament uploads, e.g. services/abc.jpg
        return '/storage/'.ltrim($path, '/');
    }
}
