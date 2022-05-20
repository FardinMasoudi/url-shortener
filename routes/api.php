<?php

use App\Http\Controllers\Admin\LinkController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\middleware\AuthMiddleware;
use MiladRahimi\PhpRouter\Router;

$router = Router::create();

// auth routes
$router->post('/register', RegisterController::class);
$router->post('/login', LoginController::class);

// admin routes
$router->group(['middleware' => [AuthMiddleware::class]], function (Router $router) {
    $router->get('/links', [LinkController::class, 'index']);
    $router->post('/links', [LinkController::class, 'store']);
    $router->post('/links/{id}/update', [LinkController::class, 'update']);
    $router->post('/links/{id}/delete', [LinkController::class, 'destroy']);
});

// client routes
$router->get('/client/links/{hash}',\App\Http\Controllers\Client\LinkController::class);

$router->dispatch();