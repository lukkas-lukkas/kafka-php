<?php

namespace EcommercePhp\Fraud\Application\Producer;

use EcommercePhp\Fraud\Domain\Decision;
use EcommercePhp\Shared\Domain\Message\Producer;

class ProducerFactory
{
    private const APPROVED_TOPIC = 'new-order-approved';
    private const REPROVED_TOPIC = 'new-order-reproved';

    public function __construct(private Producer $producer)
    {
    }

    public function factory(Decision $decision): AnalyzeFraudProducer
    {
        $topic = $decision->isApproved() ? self::APPROVED_TOPIC : self::REPROVED_TOPIC;

        return new AnalyzeFraudProducer($topic, $this->producer);
    }
}
