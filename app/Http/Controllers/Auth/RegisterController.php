<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\ApiController;
use App\Services\UserService;

class RegisterController extends ApiController
{
    public function handle(UserService $userService): \Laminas\Diactoros\Response\JsonResponse
    {
        $userService->register();

        return $this->responseOk();
    }
}