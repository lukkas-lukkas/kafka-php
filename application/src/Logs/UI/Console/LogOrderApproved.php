<?php

namespace EcommercePhp\Logs\UI\Console;

use EcommercePhp\Shared\UI\Console\AbstractProcessorCommand;
use Interop\Queue\Context;
use Interop\Queue\Message;

class LogOrderApproved extends AbstractProcessorCommand
{
    protected $signature = 'log-order-approved';

    protected function getTopic(): string
    {
        return 'new-order-approved';
    }

    protected function consume(Message $message, Context $context): void
    {
        print_r([
            'order-approved' => json_decode($message->getBody(), true)
        ]);
    }
}
