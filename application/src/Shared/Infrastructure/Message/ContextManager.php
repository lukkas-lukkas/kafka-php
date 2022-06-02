<?php

namespace EcommercePhp\Shared\Infrastructure\Message;

use Enqueue\RdKafka\RdKafkaConnectionFactory;
use Interop\Queue\Context;

class ContextManager
{
    private array $config;

    public function __construct()
    {
        $config = config('kafka');

        if (is_null($config)) {
            throw new \Exception('Kafka config is required');
        }

        $this->config = $config;
    }

    public function getContext(): Context
    {
        $factory = new RdKafkaConnectionFactory($this->config);
        return $factory->createContext();
    }

    public function setGroupId(string $groupId): void
    {
        $this->config['global']['group.id'] = $groupId;
    }
}
