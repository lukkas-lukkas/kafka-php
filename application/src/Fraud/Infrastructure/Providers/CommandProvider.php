<?php

namespace EcommercePhp\Fraud\Infrastructure\Providers;

use EcommercePhp\Fraud\UI\Console\ProcessNewOrder;
use Illuminate\Support\ServiceProvider;

class CommandProvider extends ServiceProvider
{
    public function boot()
    {
        $this->commands([
            ProcessNewOrder::class
        ]);
    }
}
