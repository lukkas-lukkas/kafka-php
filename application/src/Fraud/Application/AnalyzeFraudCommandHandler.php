<?php

namespace EcommercePhp\Fraud\Application;

use EcommercePhp\Fraud\Domain\Rules\Analyst;
use EcommercePhp\Shared\Domain\Bus\Command;
use EcommercePhp\Shared\Domain\Bus\CommandHandler;

class AnalyzeFraudCommandHandler implements CommandHandler
{
    public function __construct(private Analyst $analyst)
    {
    }

    public function handle(Command $command)
    {
        $payload = $command->toArray();

        $decision = $this->analyst->handle($payload);

        if ($decision->isApproved()) {
            print_r([
                'message' => 'pedido-aprovado',
                'order' => $command->toArray(),
            ]);
            return;
        }

        print_r([
            'message' => 'pedido-reprovado',
            'order' => $payload,
            'reason' => $decision->getMessage(),
        ]);
    }
}
