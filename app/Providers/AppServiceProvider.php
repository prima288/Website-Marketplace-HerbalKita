<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;
use Barryvdh\DomPDF\ServiceProvider as DomPDFServiceProvider;  // Add this line

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Register DomPDF service provider manually (for older Laravel versions)
        $this->app->register(DomPDFServiceProvider::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
    
        // if (config('app.env') === 'local') {
        //     URL::forceScheme('https');
        // }
    }
}
