<?php

namespace EcommercePhp\Fraud\UI\Console;

use EcommercePhp\Fraud\Application\AnalyzeFraudCommand;
use EcommercePhp\Shared\Infrastructure\Message\ContextManager;
use EcommercePhp\Shared\UI\Console\AbstractProcessorCommand;
use Illuminate\Contracts\Bus\Dispatcher;
use Interop\Queue\Context;
use Interop\Queue\Message;

class ProcessNewOrder extends AbstractProcessorCommand
{
    protected $signature = 'process-new-order';

    public function __construct(
        ContextManager $contextManager,
        private Dispatcher $dispatcher
    ) {
        parent::__construct($contextManager);
    }

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
