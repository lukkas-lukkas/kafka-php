<?php

namespace EcommercePhp\Shared\UI\Console;

use EcommercePhp\Shared\Infrastructure\Message\ContextManager;
use Enqueue\Consumption\QueueConsumer;
use Illuminate\Console\Command;
use Illuminate\Contracts\Bus\Dispatcher;
use Illuminate\Support\Facades\Log;
use Interop\Queue\Context;
use Interop\Queue\Message;
use Interop\Queue\Processor;

abstract class AbstractProcessorCommand extends Command implements Processor
{
    public function __construct(
        private ContextManager $contextManager,
        protected Dispatcher $dispatcher
    ) {
        parent::__construct();
    }

    public function __invoke(): void
    {
        $this->setGroupId();
        $context = $this->contextManager->getContext();

        $queueConsumer = new QueueConsumer($context);

        $queueConsumer->bind($this->getTopic(), $this);

        $queueConsumer->consume();
    }

    public function process(Message $message, Context $context): string
    {
        try {
            $this->consume($message, $context);
            return self::ACK;
        } catch (\Throwable $exception) {
            Log::info('process-new-order-error', [
                'message' => $exception->getMessage(),
                'file' => $exception->getFile(),
                'exception' => $exception
            ]);

            //Poderiamos tbm mandar a mensagem para uma DLQ
            return self::REJECT;
        }
    }

    private function setGroupId(): void
    {
        $groupId = (new \ReflectionClass($this))->getShortName();

        $this->contextManager->setGroupId($groupId);
    }

    abstract protected function getTopic(): string;

    abstract protected function consume(Message $message, Context $context): void;
}
