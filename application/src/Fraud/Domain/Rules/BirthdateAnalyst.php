<?php

namespace EcommercePhp\Fraud\Domain\Rules;

use Carbon\Carbon;
use EcommercePhp\Fraud\Domain\Decision;

class BirthdateAnalyst extends Analyst
{
    protected function processing(array $data): Decision
    {
        $birthdate = Carbon::createFromFormat('Y-m-d', $data['birthdate']);

        if ($birthdate->age < 15) {
            return new Decision(false, 'Idade do consumidor menor que 15 anos');
        }

        return new Decision(true);
    }
}
