<?php

namespace App\Http\Controllers\Concerns;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

trait PublishesStorageToPublic
{
    private function publishToPublicStorage(string $relativePath): void
    {
        $relativePath = ltrim(str_replace('\\', '/', $relativePath), '/');

        if ($relativePath === '') {
            return;
        }

        $source = Storage::disk('public')->path($relativePath);
        $destination = public_path('storage/' . $relativePath);

        if (! File::exists($source)) {
            return;
        }

        File::ensureDirectoryExists(dirname($destination));
        File::copy($source, $destination);
    }

    private function removeFromPublicStorage(?string $relativePath): void
    {
        $relativePath = ltrim(str_replace('\\', '/', (string) $relativePath), '/');

        if ($relativePath === '') {
            return;
        }

        $destination = public_path('storage/' . $relativePath);

        if (File::exists($destination)) {
            File::delete($destination);
        }
    }
}
