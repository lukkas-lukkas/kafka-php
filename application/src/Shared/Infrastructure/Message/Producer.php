<?php

namespace EcommercePhp\Shared\Infrastructure\Message;

use EcommercePhp\Shared\Domain\Message\Message;
use EcommercePhp\Shared\Domain\Message\Producer as ProducerInterface;
use Enqueue\RdKafka\RdKafkaConnectionFactory;

class Producer implements ProducerInterface
{
    public function produce(Message $message): void
    {
        $config = [
            'global' => [
                'group.id' => uniqid('group_id', true),
                'metadata.broker.list' => env('KAFKA_BROKERS'),
                'enable.auto.commit' => 'false',
            ],
            'topic' => [
                'auto.offset.reset' => 'beginning',
            ],
        ];

        $factory = new RdKafkaConnectionFactory($config);
        $context = $factory->createContext();

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
