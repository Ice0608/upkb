<?php

if (! function_exists('public_media_url')) {
    function public_media_url(?string $path, string $fallback = 'images/dummy-course.svg'): string
    {
        $path = trim((string) $path);

        if ($path === '') {
            return asset($fallback);
        }

        if (preg_match('#^https?://#i', $path)) {
            return $path;
        }

        $normalized = ltrim(str_replace('\\', '/', $path), '/');

        if (str_starts_with($normalized, 'storage/')) {
            $storageRelative = substr($normalized, strlen('storage/'));

            if (is_file(public_path($normalized))) {
                return asset($normalized);
            }

            if (is_file(public_path($storageRelative))) {
                return asset($storageRelative);
            }

            return asset($normalized);
        }

        if (str_starts_with($normalized, 'images/institusi/')) {
            return asset('institusi/' . substr($normalized, strlen('images/institusi/')));
        }

        if (str_starts_with($normalized, 'images/galeri/')) {
            return asset('galeri/' . substr($normalized, strlen('images/galeri/')));
        }

        if (str_starts_with($normalized, 'images/resit/')) {
            return asset('resit/' . substr($normalized, strlen('images/resit/')));
        }

        if (str_starts_with($normalized, 'institusi/')
            || str_starts_with($normalized, 'galeri/')
            || str_starts_with($normalized, 'resit/')) {
            return asset($normalized);
        }

        if (str_starts_with($normalized, 'images/')) {
            $publicCandidate = public_path($normalized);
            if (is_file($publicCandidate)) {
                return asset($normalized);
            }

            $storageCandidate = public_path('storage/' . $normalized);
            if (is_file($storageCandidate)) {
                return asset('storage/' . $normalized);
            }

            return asset($normalized);
        }

        $directCandidate = public_path($normalized);
        if (is_file($directCandidate)) {
            return asset($normalized);
        }

        $storageCandidate = public_path('storage/' . $normalized);
        if (is_file($storageCandidate)) {
            return asset('storage/' . $normalized);
        }

        return asset($normalized);
    }
}
