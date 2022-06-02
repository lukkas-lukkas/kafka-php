<?php

namespace EcommercePhp\Fraud\UI\Console;

use EcommercePhp\Shared\UI\Console\AbstractProcessorCommand;
use Interop\Queue\Context;
use Interop\Queue\Message;

class ProcessNewOrder extends AbstractProcessorCommand
{
    protected $signature = 'process-new-order';

    protected function consume(Message $message, Context $context): void
    {
        var_dump([
            'message' => $message->getBody(),
        ]);
    }

    protected function getTopic(): string
    {
        return 'new-order';
    }
}
