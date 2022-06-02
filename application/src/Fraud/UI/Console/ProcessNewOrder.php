<?php

namespace EcommercePhp\Fraud\UI\Console;

use EcommercePhp\Fraud\Application\AnalyzeFraudCommand;
use EcommercePhp\Shared\UI\Console\AbstractProcessorCommand;
use Interop\Queue\Context;
use Interop\Queue\Message;

class ProcessNewOrder extends AbstractProcessorCommand
{
    protected $signature = 'process-new-order';

    protected function consume(Message $message, Context $context): void
    {
        $payload = json_decode($message->getBody(), true);

        $command = new AnalyzeFraudCommand($payload);

        $this->dispatcher->dispatchNow($command);
    }

    protected function getTopic(): string
    {
        return 'new-order';
    }
}
