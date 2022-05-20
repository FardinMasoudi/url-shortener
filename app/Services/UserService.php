<?php

namespace App\Services;

use App\jwt\JwtHandler;
use App\Repositories\Mysql\MysqlUserRepository;

class UserService
{
    private $userRepo;

    public function __construct(MysqlUserRepository $userRepository)
    {
        $this->userRepo = $userRepository;
    }

    public function register()
    {
        return $this->userRepo->register();
    }

    public function login()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $user = $this->userRepo->findUserByUsername($username);

        if ($this->isPasswordCorrect($password, $user['password'])) {
            return $this->generateToken($user);
        }
    }

    private function isPasswordCorrect($password, $userPassword): bool
    {
        return password_verify($password, $userPassword);

    }

    private function generateToken($user): string
    {
        $jwt = new JwtHandler();
        return $jwt->jwtEncodeData('http://localhost:88/',
            array("id" => $user['id'], "name" => $user['name'], "username" => $user['username'])
        );

    }
}