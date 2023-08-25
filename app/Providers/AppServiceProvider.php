<?php

namespace App\Providers;

use App\Database\LimitedConnection;
use Illuminate\Database\Connection;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(Connection::class, function ($app) {
            return new LimitedConnection(
                $app['db.factory']->make($app['config']['database.connections'][$app['config']['database.default']]),
                3
            );
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
