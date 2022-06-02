<?php

namespace EcommercePhp\NewOrder\Application;

class NewOrderCommandHandler
{
    public function handle(NewOrderCommand $command): array
    {
        return [
            'payload' => $command->toArray(),
        ];
    }
}
