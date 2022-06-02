<?php

namespace EcommercePhp\NewOrder\UI\Http\Routes;

use EcommercePhp\Shared\UI\Http\Routes\AbstractModuleRoute;

class ModuleRoutes extends AbstractModuleRoute
{
    public function routes(): array
    {
        return [
            NewOrderRoute::class,
        ];
    }
}
