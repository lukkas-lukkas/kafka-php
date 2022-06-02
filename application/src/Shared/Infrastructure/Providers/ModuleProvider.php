<?php

namespace EcommercePhp\Shared\Infrastructure\Providers;

use Illuminate\Support\ServiceProvider;

class ModuleProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->register(DependencyInjectionProvider::class);
    }
}
