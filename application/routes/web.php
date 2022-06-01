<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function (\EcommercePhp\Fraud\Domain\Rules\Analyst $analyst) use ($router) {
    $decision = $analyst->handle([
        'birthdate' => '1994-05-20',
        'amount' => 150000
    ]);

    return response()->json([
        'approved' => $decision->isApproved(),
        'message' => $decision->getMessage(),
    ]);
});
