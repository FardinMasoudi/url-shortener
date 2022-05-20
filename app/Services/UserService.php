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
        // validate inputs
        if (!isset($_POST['username'])){
            return 'username is required';
        }
        if (!isset($_POST['password'])){
            return 'password is required';
        }
        $user = $this->userRepo->findUserByUsername($_POST['username']);

        if ($this->isPasswordCorrect($_POST['password'], $user['password'])) {
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