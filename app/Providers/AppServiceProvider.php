<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Helpers\SettingsHelper;

use Illuminate\Support\Facades\View;

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
        $settings = new SettingsHelper;
        View::share('settings',  $settings );
    }
}
