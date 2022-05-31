<?php

namespace EcommercePhp\Shared\Domain\Message;

interface Message
{
    public function getTopic(): string;

    public function getBody(): string;

    public function getKey(): string;

    public function getHeaders(): array;

    public function getProperties(): array;
}
