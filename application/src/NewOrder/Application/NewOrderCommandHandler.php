<?php

namespace EcommercePhp\NewOrder\Application;

use EcommercePhp\NewOrder\Domain\Validator\PayloadValidator;
use EcommercePhp\Shared\Domain\Bus\Command;
use EcommercePhp\Shared\Domain\Bus\CommandHandler;
use Enqueue\RdKafka\RdKafkaConnectionFactory;
use Illuminate\Support\Str;

class NewOrderCommandHandler implements CommandHandler
{
    public function __construct(private PayloadValidator $validator)
    {
    }

    public function handle(Command $command): array
    {
        $this->validator->validate($command->toArray());

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

        $topic = $context->createTopic('example-topic');

        $message = $context->createMessage(
            json_encode($command->toArray()),
            [],
            []
        );

        $message->setKey(Str::uuid()->toString());
        //$message->setKey('minha-key');

        $producer = $context->createProducer();

        $producer->send($topic, $message);

        return [
            'message' => 'Obrigado pelo pedido',
        ];
    }
}
