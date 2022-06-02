<?php

namespace EcommercePhp\Fraud\Domain\Rules;

use EcommercePhp\Fraud\Domain\Decision;

abstract class Analyst
{
    public function __construct(private ?Analyst $next = null)
    {
    }

    final public function handle(array $data): Decision
    {
        $decision = $this->processing($data);

        if ($decision->isApproved() === true && $this->next !== null) {
            $decision = $this->next->handle($data);
        }

        return $decision;
    }

    abstract protected function processing(array $data): Decision;
}
