<?php

namespace EcommercePhp\Shared\UI\Http\Routes;

abstract class AbstractModuleRoute
{
    public static function register(): void
    {
        $module = new static();

        foreach ($module->routes() as $route) {
            (new $route)->route();
        }
    }

    abstract protected function routes(): array;
}
