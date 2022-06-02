<?php

namespace EcommercePhp\NewOrder\UI\Http\Actions;

use App\Http\Controllers\Controller;
use EcommercePhp\NewOrder\Application\NewOrderCommand;
use Illuminate\Contracts\Bus\Dispatcher;
use Illuminate\Http\JsonResponse;

class NewOrderAction extends Controller
{
    public function __construct(private Dispatcher $dispatcher)
    {
    }

    public function __invoke(): JsonResponse
    {
        $command = new NewOrderCommand(
            'Full name',
            '123456',
            '1994-05-20',
            'email@test.com',
            '10000'
        );

        $result = $this->dispatcher->dispatchNow($command);

        return response()->json($result);
    }
}
