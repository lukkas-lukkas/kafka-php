<?php

namespace EcommercePhp\Logs\UI\Console;

use EcommercePhp\Shared\UI\Console\AbstractProcessorCommand;
use Interop\Queue\Context;
use Interop\Queue\Message;

class LogNewOrder extends AbstractProcessorCommand
{
    protected $signature = 'log-new-order';

    protected function getTopic(): string
    {
        return 'new-order';
    }

    protected function consume(Message $message, Context $context): void
    {
        print_r([
            'new-order' => json_decode($message->getBody(), true)
        ]);
    }
}
