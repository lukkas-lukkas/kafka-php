<?php

namespace EcommercePhp\NewOrder\UI\Http\Actions;

use EcommercePhp\NewOrder\Application\NewOrderCommand;
use EcommercePhp\Shared\UI\Http\Actions\AbstractAction;
use Illuminate\Http\JsonResponse;

class NewOrderAction extends AbstractAction
{
    public function __invoke(): JsonResponse
    {
        $command = new NewOrderCommand(
            'New full name',
            '123456',
            '1994-05-20',
            'email@test.com',
            '10000'
        );

        $result = $this->dispatcher->dispatchNow($command);

        return response()->json($result);
    }
}
