<?php

namespace EcommercePhp\NewOrder\Application;

use EcommercePhp\NewOrder\Domain\Validator\PayloadValidator;
use EcommercePhp\Shared\Domain\Bus\Command;
use EcommercePhp\Shared\Domain\Bus\CommandHandler;

class NewOrderCommandHandler implements CommandHandler
{
    public function __construct(
        private PayloadValidator $validator,
        private NewOrderProducer $producer
    ) {
    }

    public function handle(Command $command): array
    {
        $this->validator->validate($command->toArray());

        $this->producer->produce($command->toArray());

        return [
            'message' => 'Obrigado pelo pedido',
        ];
    }
}
