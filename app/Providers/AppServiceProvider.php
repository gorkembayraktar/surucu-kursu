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
       // paket kurulumunda settings table olmayacağında eğer console çalışmıyorsa bu işlemi dağıt
       if (!$this->app->runningInConsole()) {
            $settings = new SettingsHelper;
            View::share('settings',  $settings );
        }
    }
}
