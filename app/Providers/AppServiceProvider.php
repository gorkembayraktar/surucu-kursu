<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Models\Settings;

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
        $settings = new Settings;
        View::share('settings',  $settings );
    }
}
