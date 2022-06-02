<?php

namespace EcommercePhp\NewOrder\Infrastructure\Providers;

use Illuminate\Support\ServiceProvider;

class ModuleProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->register(CommandBusProvider::class);
    }
}
