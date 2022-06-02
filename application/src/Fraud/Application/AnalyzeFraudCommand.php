<?php

namespace EcommercePhp\Fraud\Application;

use EcommercePhp\Shared\Domain\Bus\Command;

class AnalyzeFraudCommand implements Command
{
    public function __construct(private array $data)
    {
    }

    public function toArray(): array
    {
        return $this->data;
    }
}
