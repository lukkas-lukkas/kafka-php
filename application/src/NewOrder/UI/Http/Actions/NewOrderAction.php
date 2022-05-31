<?php

namespace EcommercePhp\NewOrder\UI\Http\Actions;

use EcommercePhp\NewOrder\Application\NewOrderCommand;
use EcommercePhp\NewOrder\Domain\Exception\PayloadValidationException;
use EcommercePhp\Shared\UI\Http\Actions\AbstractAction;
use Illuminate\Http\JsonResponse;

class NewOrderAction extends AbstractAction
{
    public function __invoke(): JsonResponse
    {
        try {
            $command = new NewOrderCommand(
                $this->request->get('name', ''),
                $this->request->get('document', ''),
                $this->request->get('birthdate', ''),
                $this->request->get('email', ''),
                $this->request->get('amount', '')
            );

            $result = $this->dispatcher->dispatchNow($command);

            return response()->json($result);
        } catch (PayloadValidationException $exception) {
            return response()
                ->json([
                    'message' => $exception->getMessage(),
                    'errors' => $exception->errors()
                ])
                ->setStatusCode(422);
        }
    }
}
