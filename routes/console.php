<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('storage:mirror {--clean : Remove mirrored files that no longer exist in source}', function () {
    $sourceRoot = storage_path('app/public');
    $targetRoot = public_path('storage');

    if (! is_dir($sourceRoot)) {
        $this->error("Source folder not found: {$sourceRoot}");
        return 1;
    }

    if (! is_dir($targetRoot)) {
        mkdir($targetRoot, 0755, true);
    }

    $copied = 0;

    $iterator = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($sourceRoot, FilesystemIterator::SKIP_DOTS),
        RecursiveIteratorIterator::SELF_FIRST
    );

    foreach ($iterator as $item) {
        $relativePath = substr($item->getPathname(), strlen($sourceRoot) + 1);
        $destination = $targetRoot . DIRECTORY_SEPARATOR . $relativePath;

        if ($item->isDir()) {
            if (! is_dir($destination)) {
                mkdir($destination, 0755, true);
            }
            continue;
        }

        $destinationDir = dirname($destination);
        if (! is_dir($destinationDir)) {
            mkdir($destinationDir, 0755, true);
        }

        if (! file_exists($destination) || filemtime($destination) < filemtime($item->getPathname())) {
            copy($item->getPathname(), $destination);
            $copied++;
        }
    }

    if ($this->option('clean')) {
        $removed = 0;
        $targetIterator = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator($targetRoot, FilesystemIterator::SKIP_DOTS),
            RecursiveIteratorIterator::CHILD_FIRST
        );

        foreach ($targetIterator as $item) {
            $relativePath = substr($item->getPathname(), strlen($targetRoot) + 1);
            $sourcePath = $sourceRoot . DIRECTORY_SEPARATOR . $relativePath;

            if (! file_exists($sourcePath)) {
                if ($item->isDir()) {
                    @rmdir($item->getPathname());
                } else {
                    @unlink($item->getPathname());
                }
                $removed++;
            }
        }

        $this->info("Mirrored {$copied} files and removed {$removed} stale files.");
        return 0;
    }

    $this->info("Mirrored {$copied} files from storage/app/public to public/storage.");
    return 0;
})->purpose('Mirror the public storage files into the web root without using a symlink');
