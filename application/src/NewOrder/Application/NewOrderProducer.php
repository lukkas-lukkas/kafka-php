<?php

namespace EcommercePhp\NewOrder\Application;

use EcommercePhp\NewOrder\Infrastructure\Message\Message;
use EcommercePhp\Shared\Domain\Message\Producer;
use Illuminate\Support\Str;

class NewOrderProducer
{
    private const TOPIC = 'new-order';

    public function __construct(private Producer $producer)
    {
    }

    public function produce(array $payload): void
    {
        $message = new Message(
            self::TOPIC,
            $payload,
            Str::uuid()->toString()
        );

        $this->producer->produce($message);
    }
}
