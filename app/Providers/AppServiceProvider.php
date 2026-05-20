<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Institusi;
use App\Models\Kursus;
use App\Observers\InstitusiObserver;
use App\Observers\KursusObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Register model observers for cascade updates
        Institusi::observe(InstitusiObserver::class);
        Kursus::observe(KursusObserver::class);
    }
}
