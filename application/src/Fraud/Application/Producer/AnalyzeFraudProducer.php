<?php

namespace EcommercePhp\Fraud\Application\Producer;

use EcommercePhp\NewOrder\Infrastructure\Message\Message;
use EcommercePhp\Shared\Domain\Message\Producer;
use Illuminate\Support\Str;

class AnalyzeFraudProducer
{
    public function __construct(
        private string $topic,
        private Producer $producer
    ) {
    }

    public function produce(array $payload): void
    {
        $message = new Message(
            $this->topic,
            $payload,
            Str::uuid()->toString()
        );

        $this->producer->produce($message);
    }
}
