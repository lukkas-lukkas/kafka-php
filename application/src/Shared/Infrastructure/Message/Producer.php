<?php

namespace EcommercePhp\Shared\Infrastructure\Message;

use EcommercePhp\Shared\Domain\Message\Message;
use EcommercePhp\Shared\Domain\Message\Producer as ProducerInterface;

class Producer implements ProducerInterface
{
    public function __construct(private ContextManager $contextManager)
    {
    }

    public function produce(Message $message): void
    {
        $context = $this->contextManager->getContext();
        $topic = $context->createTopic($message->getTopic());

        $queueMessage = $context->createMessage(
            $message->getBody(),
            $message->getProperties(),
            $message->getHeaders()
        );

        $queueMessage->setKey($message->getKey());

        $producer = $context->createProducer();

        $producer->send($topic, $queueMessage);
    }
}
