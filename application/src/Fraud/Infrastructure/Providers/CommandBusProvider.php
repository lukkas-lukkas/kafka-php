<?php

namespace EcommercePhp\Fraud\Infrastructure\Providers;

use EcommercePhp\Fraud\Application\AnalyzeFraudCommand;
use EcommercePhp\Fraud\Application\AnalyzeFraudCommandHandler;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\ServiceProvider;

class CommandBusProvider extends ServiceProvider
{
    public function boot()
    {
        Bus::map([
            AnalyzeFraudCommand::class => AnalyzeFraudCommandHandler::class,
        ]);
    }
}
