<?php

namespace EcommercePhp\NewOrder\Application;

class NewOrderCommand
{
    public function __construct(
        private string $name,
        private string $document,
        private string $birthdate,
        private string $email,
        private string $amount
    ) {
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'document' => $this->document,
            'birthdate' => $this->birthdate,
            'email' => $this->email,
            'amount' => $this->amount,
        ];
    }
}
