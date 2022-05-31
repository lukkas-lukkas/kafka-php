<?php

namespace EcommercePhp\NewOrder\Infrastructure\Providers;

use EcommercePhp\NewOrder\UI\Http\Routes\ModuleRoutes;
use Illuminate\Support\ServiceProvider;

class RouteProvider extends ServiceProvider
{
    public function register()
    {
        ModuleRoutes::register();
    }
}
