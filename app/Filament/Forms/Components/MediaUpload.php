<?php

namespace App\Filament\Forms\Components;

use Filament\Forms\Components\FileUpload;

class MediaUpload
{
    public static function make(string $name, string $directory, string $label = 'Image'): FileUpload
    {
        return FileUpload::make($name)
            ->label($label)
            ->image()
            ->disk('public')
            ->directory($directory)
            ->visibility('public')
            ->imagePreviewHeight('200')
            ->downloadable()
            ->openable()
            ->maxSize(5120)
            ->acceptedFileTypes([
                'image/jpeg',
                'image/png',
                'image/webp',
                'image/gif',
                'image/svg+xml',
            ])
            ->helperText('Upload an image (JPG, PNG, WEBP, GIF, or SVG). Max 5 MB.')
            // Keep legacy /images/... paths when the admin saves without re-uploading.
            ->fetchFileInformation(false)
            ->getUploadedFileUsing(function (FileUpload $component, string $file, string | array | null $storedFileNames): ?array {
                $storage = $component->getDisk();

                // Storage-relative upload (e.g. projects/abc.jpg)
                if ($storage->exists($file)) {
                    $url = $storage->url($file);

                    return [
                        'name' => basename($file),
                        'size' => $storage->size($file),
                        'type' => $storage->mimeType($file),
                        'url' => $url,
                    ];
                }

                // Legacy frontend public path — show as remote preview, keep value on save.
                if (str_starts_with($file, '/images/') || str_starts_with($file, 'http://') || str_starts_with($file, 'https://')) {
                    return [
                        'name' => basename($file),
                        'size' => 0,
                        'type' => null,
                        'url' => $file,
                    ];
                }

                return null;
            });
    }
}
