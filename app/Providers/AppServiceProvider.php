<?php

namespace App\Providers;

use App\Repositories\ReportRepository;
use App\Services\ChromeDriverService;
use App\Services\WebDriverService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(ChromeDriverService::class, ChromeDriverService::class);
        $this->app->singleton(WebDriverService::class, WebDriverService::class);
        $this->app->singleton(ReportRepository::class, ReportRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (\App::environment('production')) {
            \URL::forceScheme('https');
        }
    }
}
