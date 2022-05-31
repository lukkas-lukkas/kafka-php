<?php

namespace EcommercePhp\NewOrder\UI\Http\Routes;

use EcommercePhp\NewOrder\UI\Http\Actions\NewOrderAction;
use EcommercePhp\Shared\UI\Http\Routes\AbstractRoute;

class NewOrderRoute extends AbstractRoute
{
    public function route(): void
    {
        $this->router->post('/api/new-order', NewOrderAction::class);
    }
}
