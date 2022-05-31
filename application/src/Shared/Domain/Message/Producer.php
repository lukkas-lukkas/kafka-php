<?php

namespace EcommercePhp\Shared\Domain\Message;

interface Producer
{
    public function produce(Message $message): void;
}
