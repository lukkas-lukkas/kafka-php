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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('/test', function (\Illuminate\Contracts\Bus\Dispatcher $dispatcher) use ($router) {
    $command = new \EcommercePhp\NewOrder\Application\NewOrderCommand(
        'Full name',
        '123456',
        '1994-05-20',
        'email@test.com',
        '10000'
    );

    $result = $dispatcher->dispatchNow($command);

    return response()->json($result);
});
