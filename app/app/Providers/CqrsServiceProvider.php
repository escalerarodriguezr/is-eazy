<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use IsEazy\Application\Shared\Cqrs\CommandBus;
use IsEazy\Infrastructure\Cqrs\CommandBus\LaravelCommandBus;

class CqrsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CommandBus::class, LaravelCommandBus::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
