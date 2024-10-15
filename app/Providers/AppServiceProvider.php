<?php

namespace App\Providers;

use App\Interfaces\IViewService;
use App\Services\ViewIp;
use App\Services\ViewCookie;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // $this->app->bind(IViewService::class, ViewIp::class);
        $this->app->bind(IViewService::class, ViewCookie::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
