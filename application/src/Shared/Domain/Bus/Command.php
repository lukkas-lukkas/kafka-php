<?php

namespace EcommercePhp\Shared\Domain\Bus;

interface Command
{
    public function toArray(): array;
}
