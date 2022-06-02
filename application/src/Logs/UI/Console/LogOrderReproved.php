<?php

namespace EcommercePhp\Logs\UI\Console;

use EcommercePhp\Shared\UI\Console\AbstractProcessorCommand;
use Interop\Queue\Context;
use Interop\Queue\Message;

class LogOrderReproved extends AbstractProcessorCommand
{
    protected $signature = 'log-order-reproved';

    protected function getTopic(): string
    {
        return 'new-order-reproved';
    }

    protected function consume(Message $message, Context $context): void
    {
        print_r([
            'order-reproved' => json_decode($message->getBody(), true)
        ]);
    }
}
