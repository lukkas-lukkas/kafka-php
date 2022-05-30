<?php

namespace EcommercePhp\NewOrder\Application;

use EcommercePhp\Shared\Domain\Bus\Command;
use EcommercePhp\Shared\Domain\Bus\CommandHandler;

class NewOrderCommandHandler implements CommandHandler
{
    public function handle(Command $command): array
    {
        return [
            'payload' => $command->toArray(),
        ];
    }
}
