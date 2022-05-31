<?php

namespace EcommercePhp\Shared\Domain\Bus;

interface CommandHandler
{
    public function handle(Command $command);
}
