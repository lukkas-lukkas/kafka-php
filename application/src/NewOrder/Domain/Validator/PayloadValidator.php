<?php

namespace EcommercePhp\NewOrder\Domain\Validator;

use EcommercePhp\NewOrder\Domain\Exception\PayloadValidationException;
use Illuminate\Support\Facades\Validator;

class PayloadValidator
{
    public function validate(array $payload): void
    {
        $validator = Validator::make($payload, $this->rules());

        if ($validator->fails()) {
            throw new PayloadValidationException(
                'Payload validation fail',
                $validator->errors()->all()
            );
        }
    }

    private function rules(): array
    {
        return [
            'name' => ['required'],
            'document' => ['required'],
            'birthdate' => ['required', 'date_format:Y-m-d'],
            'email' => ['required', 'email'],
            'amount' => ['required', 'integer']
        ];
    }
}
