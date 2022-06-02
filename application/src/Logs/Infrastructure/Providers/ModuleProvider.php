<?php

namespace EcommercePhp\Logs\Infrastructure\Providers;

use Illuminate\Support\ServiceProvider;

class ModuleProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->register(CommandProvider::class);
    }
}
