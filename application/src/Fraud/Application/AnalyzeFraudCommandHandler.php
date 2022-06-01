<?php

namespace EcommercePhp\Fraud\Application;

use Carbon\Carbon;
use EcommercePhp\Shared\Domain\Bus\Command;
use EcommercePhp\Shared\Domain\Bus\CommandHandler;

class AnalyzeFraudCommandHandler implements CommandHandler
{
    public function handle(Command $command)
    {
        $payload = $command->toArray();

        if ((int) $payload['amount'] > 15000) {
            print_r([
                'message' => 'pedido-reprovado',
                'order' => $payload,
                'reason' => 'Valor do pedido maior de R$ 15.000,00',
            ]);
            return;
        }

        $birthdate = Carbon::createFromFormat('Y-m-d', $payload['birthdate']);

        if ($birthdate->age < 15) {
            print_r([
                'message' => 'pedido-reprovado',
                'order' => $payload,
                'reason' => 'Idade do consumidor menor que 15 anos',
            ]);
            return;
        }

        print_r([
            'message' => 'pedido-aprovado',
            'order' => $command->toArray(),
        ]);
    }
}
