<?php

namespace EcommercePhp\NewOrder\UI\Http\Routes;

class ModuleRoutes
{
    public static function register(): void
    {
        $module = new static();

        foreach ($module->routes() as $route) {
            (new $route)->route();
        }
    }

    public function routes(): array
    {
        return [
            NewOrderRoute::class,
        ];
    }
}
