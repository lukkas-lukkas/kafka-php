<?php

namespace EcommercePhp\NewOrder\Infrastructure\Message;

use EcommercePhp\Shared\Domain\Message\Message as MessageInterface;

class Message implements MessageInterface
{
    public function __construct(
        private string $topic,
        private array $body,
        private string $key,
        private array $headers = [],
        private array $properties = []
    ) {
    }

    public function getTopic(): string
    {
        return $this->topic;
    }

    public function getBody(): string
    {
        return json_encode($this->body);
    }

    public function getKey(): string
    {
        return $this->key;
    }

    public function getHeaders(): array
    {
        return $this->headers;
    }

    public function getProperties(): array
    {
        return $this->properties;
    }
}
