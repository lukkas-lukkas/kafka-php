<?php

namespace EcommercePhp\NewOrder\Infrastructure\Providers;

use EcommercePhp\NewOrder\Application\NewOrderCommand;
use EcommercePhp\NewOrder\Application\NewOrderCommandHandler;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\ServiceProvider;

class CommandBusProvider extends ServiceProvider
{
    public function register()
    {
        Bus::map([
            NewOrderCommand::class => NewOrderCommandHandler::class,
        ]);
    }
}
