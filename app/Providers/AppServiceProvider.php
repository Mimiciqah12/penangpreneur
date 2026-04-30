<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

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
        // Memaksa sistem menggunakan pautan HTTPS (selamat) 
        // hanya apabila ia tidak berada di localhost komputer ('local')
        if (env('APP_ENV') !== 'local') {
            URL::forceScheme('https');
        }
    }
}