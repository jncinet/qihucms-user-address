<?php

namespace Qihucms\UserAddress;

use Illuminate\Support\ServiceProvider;

class AddressServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../routes.php');
        if ($this->app->runningInConsole()) {
            $this->loadMigrationsFrom(__DIR__ . '/../migrations');
        }

        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'user-address');
        $this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/user-address'),
        ]);
    }
}
