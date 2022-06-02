<?php

namespace EcommercePhp\Fraud\Domain;

class Decision
{
    public function __construct(
        private bool $approved,
        private string $message = ''
    ){
        if ($this->approved === false && empty($this->message)) {
            throw new \Exception('Decision reproved need a message');
        }
    }

    public function isApproved(): bool
    {
        return $this->approved;
    }

    public function getMessage(): string
    {
        return $this->message;
    }
}
