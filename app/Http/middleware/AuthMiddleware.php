<?php

namespace App\Http\middleware;

use App\jwt\JwtHandler;
use Laminas\Diactoros\Response\JsonResponse;
use Psr\Http\Message\ServerRequestInterface;

class AuthMiddleware extends JwtHandler
{

    public function handle(ServerRequestInterface $request, \Closure $next)
    {
        if ($request->getHeader('Authorization') && $this->isTokenValid($request)) {
            return $next($request);
        }

        return new JsonResponse(['error' => 'Unauthorized!'], 401);
    }

    public function isTokenValid($request)
    {
        try {
            if (preg_match('/Bearer\s(\S+)/', $request->getHeaderLine('Authorization'), $matches)) {
                $data = $this->jwtDecodeData($matches[1]);

                if (isset($data['data']->id)) {
                    return true;
                } else {
                    return [
                        "success" => 0,
                        "message" => $data['message'],
                    ];
                }
            } else {
                return [
                    "success" => 0,
                    "message" => "Token not found in request"
                ];
            }
        } catch (\Exception $exception) {
            return $exception;
        }
    }
}
