<?php

namespace EcommercePhp\Fraud\UI\Console;

use EcommercePhp\Shared\Infrastructure\Message\ContextManager;
use Enqueue\Consumption\QueueConsumer;
use Illuminate\Console\Command;
use Interop\Queue\Context;
use Interop\Queue\Message;
use Interop\Queue\Processor;

class ProcessNewOrder extends Command implements Processor
{
    protected $signature = 'process-new-order';

    private const TOPIC = 'new-order';

    public function __construct(private ContextManager $contextManager)
    {
        parent::__construct();
    }

    public function __invoke(): void
    {
        $this->contextManager->setGroupId('ProcessNewOrder');
        $context = $this->contextManager->getContext();

        $queueConsumer = new QueueConsumer($context);

        $queueConsumer->bind(self::TOPIC, $this);

        $queueConsumer->consume();
    }

    public function process(Message $message, Context $context)
    {
        try {
            var_dump([
                'message' => $message->getBody(),
            ]);

            return self::ACK;
        } catch (\Throwable $throwable) {
            echo "Erro no consumo da mensagem" . PHP_EOL;

            return self::REJECT;
        }
    }
}
