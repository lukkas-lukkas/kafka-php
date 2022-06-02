<?php

namespace EcommercePhp\Logs\Infrastructure\Providers;

use EcommercePhp\Logs\UI\Console\LogNewOrder;
use EcommercePhp\Logs\UI\Console\LogOrderApproved;
use EcommercePhp\Logs\UI\Console\LogOrderReproved;
use Illuminate\Support\ServiceProvider;

class CommandProvider extends ServiceProvider
{
    public function register()
    {
        $this->commands([
            LogNewOrder::class,
            LogOrderApproved::class,
            LogOrderReproved::class,
        ]);
    }
}
