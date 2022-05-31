<?php

namespace EcommercePhp\NewOrder\Domain\Exception;

class PayloadValidationException extends \Exception
{
    public function __construct(
        string $message,
        private array $errors,
        int $code = 0,
        \Throwable $previous = null
    ) {
        parent::__construct($message, $code, $previous);
    }

    public function errors(): array
    {
        return $this->errors;
    }
}
