<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL; // Baris ini ditambah

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
        // Blok kod ini ditambah untuk memaksa HTTPS di Render
        if (env('APP_ENV') !== 'local') {
            URL::forceScheme('https');
        }
    }
}