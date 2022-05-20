<?php

namespace App\Http\Controllers;

use Laminas\Diactoros\Response\JsonResponse;

class ApiController
{
    private $hasError = false;
    private $responseCode = 200;
    const  HTTP_BAD_REQUEST = 400;
    const  HTTP_OK = 200;


    public function setHasError($hasError)
    {
        $this->hasError = $hasError;
        return $this;
    }

    public function setResponseCode($code)
    {
        $this->responseCode = $code;
        return $this;
    }

    public function response($data, $code)
    {
        return new JsonResponse([
            'error' => $this->hasError,
            'code' => $code,
            'data' => $data
        ], 401);
    }

    public function responseOk($data = null, $code = 200)
    {
        return $this->setHasError(false)
            ->setResponseCode(self::HTTP_OK)
            ->response($data, $code);
    }

    public function responseError($error = null, $code = self::HTTP_BAD_REQUEST)
    {
        return $this->setHasError(true)
            ->setResponseCode(self::HTTP_BAD_REQUEST)
            ->response($error, $code);
    }
}