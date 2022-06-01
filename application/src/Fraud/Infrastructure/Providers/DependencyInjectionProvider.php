<?php

namespace EcommercePhp\Fraud\Infrastructure\Providers;

use EcommercePhp\Fraud\Domain\Rules\Analyst;
use EcommercePhp\Fraud\Domain\Rules\AnalystFactory;
use Illuminate\Support\ServiceProvider;

class DependencyInjectionProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(Analyst::class, function () {
            return AnalystFactory::factory();
        });
    }
}
