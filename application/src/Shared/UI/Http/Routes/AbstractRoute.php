<?php

namespace EcommercePhp\Shared\UI\Http\Routes;

use Laravel\Lumen\Routing\Router;

class AbstractRoute
{
    protected Router $router;

    public function __construct()
    {
        $this->router = app('router');
    }
}
