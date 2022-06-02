<?php

namespace EcommercePhp\NewOrder\UI\Http\Routes;

use EcommercePhp\NewOrder\UI\Http\Actions\NewOrderAction;
use Laravel\Lumen\Routing\Router;

class NewOrderRoute
{
    private Router $router;

    public function __construct()
    {
        $this->router = app('router');
    }

    public function route(): void
    {
        $this->router->get('/api/new-order', NewOrderAction::class);
    }
}
