<?php

namespace App\Http\Controllers\Concerns;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

trait PublishesStorageToPublic
{
    private function resolveWebPublicRoot(): string
    {
        $configured = env('APP_PUBLIC_PATH');

        if (filled($configured) && is_dir($configured)) {
            return rtrim($configured, DIRECTORY_SEPARATOR);
        }

        $siblingPublicHtml = dirname(base_path()) . DIRECTORY_SEPARATOR . 'public_html';
        if (is_dir($siblingPublicHtml)) {
            return rtrim($siblingPublicHtml, DIRECTORY_SEPARATOR);
        }

        return public_path();
    }

    private function publishToPublicStorage(string $relativePath): void
    {
        $relativePath = ltrim(str_replace('\\', '/', $relativePath), '/');

        if ($relativePath === '') {
            return;
        }

        $source = Storage::disk('public')->path($relativePath);

        if (! File::exists($source)) {
            return;
        }

        $webRoot = $this->resolveWebPublicRoot();
        $destinations = [
            $webRoot . DIRECTORY_SEPARATOR . $relativePath,
            $webRoot . DIRECTORY_SEPARATOR . 'storage' . DIRECTORY_SEPARATOR . $relativePath,
        ];

        foreach ($destinations as $destination) {
            File::ensureDirectoryExists(dirname($destination));
            File::copy($source, $destination);
        }
    }

    private function removeFromPublicStorage(?string $relativePath): void
    {
        $relativePath = ltrim(str_replace('\\', '/', (string) $relativePath), '/');

        if ($relativePath === '') {
            return;
        }

        $webRoot = $this->resolveWebPublicRoot();
        foreach ([
            $webRoot . DIRECTORY_SEPARATOR . $relativePath,
            $webRoot . DIRECTORY_SEPARATOR . 'storage' . DIRECTORY_SEPARATOR . $relativePath,
        ] as $destination) {
            if (File::exists($destination)) {
                File::delete($destination);
            }
        }
    }
}
