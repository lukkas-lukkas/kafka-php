<?php

namespace EcommercePhp\Fraud\Domain\Rules;

use EcommercePhp\Fraud\Domain\Decision;

class AmountAnalyst extends Analyst
{
    protected function processing(array $data): Decision
    {
        if ((int) $data['amount'] > 15000) {
            return new Decision(false, 'Valor do pedido maior que R$ 15.000,00');
        }

        return new Decision(true);
    }
}
