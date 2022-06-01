<?php

namespace EcommercePhp\Fraud\Domain\Rules;

class AnalystFactory
{
    public static function factory(): Analyst
    {
        $amountRule = new AmountAnalyst();
        return new BirthdateAnalyst($amountRule);
    }
}
