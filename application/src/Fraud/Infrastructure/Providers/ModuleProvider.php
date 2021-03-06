<?php

namespace EcommercePhp\Fraud\Infrastructure\Providers;

use Illuminate\Support\ServiceProvider;

class ModuleProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->register(CommandProvider::class);
        $this->app->register(CommandBusProvider::class);
        $this->app->register(DependencyInjectionProvider::class);
    }
}
