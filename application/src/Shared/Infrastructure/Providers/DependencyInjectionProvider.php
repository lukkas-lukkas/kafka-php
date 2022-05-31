<?php

namespace EcommercePhp\Shared\Infrastructure\Providers;

use EcommercePhp\Shared\Domain\Message\Producer as ProducerInterface;
use EcommercePhp\Shared\Infrastructure\Message\Producer;
use Illuminate\Support\ServiceProvider;

class DependencyInjectionProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(ProducerInterface::class, Producer::class);
    }
}
