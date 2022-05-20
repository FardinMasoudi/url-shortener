<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\ApiController;
use App\Services\UserService;

class LoginController extends ApiController
{
    public function handle(UserService $userService): \Laminas\Diactoros\Response\JsonResponse
    {
        $info = $userService->login();

        return $this->responseOk($info);
    }
}