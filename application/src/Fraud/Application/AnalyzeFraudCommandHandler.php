<?php

namespace EcommercePhp\Fraud\Application;

use EcommercePhp\Fraud\Application\Producer\ProducerFactory;
use EcommercePhp\Fraud\Domain\Rules\Analyst;
use EcommercePhp\Shared\Domain\Bus\Command;
use EcommercePhp\Shared\Domain\Bus\CommandHandler;

class AnalyzeFraudCommandHandler implements CommandHandler
{
    public function __construct(
        private Analyst $analyst,
        private ProducerFactory $factory
    ) {
    }

    public function handle(Command $command): void
    {
        $payload = $command->toArray();

        $decision = $this->analyst->handle($payload);

        if ($decision->isApproved() === false) {
            $payload['message'] = $decision->getMessage();
        }

        $this->factory
            ->factory($decision)
            ->produce($payload);
    }
}
