<?php

namespace App\Repositories\Mysql;

use App\jwt\JwtHandler;
use Database\MysqlDbConfig;
use PDO;

class MysqlUserRepository
{
    public $pdo;

    public function __construct(MysqlDbConfig $dbConfig)
    {
        $this->pdo = $dbConfig->handle();
    }

    public function register()
    {
        $name = $_POST['name'];
        $username = $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $sql = "INSERT INTO users(name,username,password) values (:name,:username,:password)";
        $query = $this->pdo->prepare($sql);

        $query->bindParam(':name', $name, PDO::PARAM_STR);
        $query->bindParam(':username', $username, PDO::PARAM_STR);
        $query->bindParam(':password', $password, PDO::PARAM_STR);

        return $query->execute();

    }

    public function findUserByUsername($username)
    {
        $sql = "SELECT * FROM users where username=:username";
        $query = $this->pdo->prepare($sql);

        $query->bindValue(':username', $username, \PDO::PARAM_STR);
        $query->execute();

        if ($query->rowCount()) {
            return $query->fetch(PDO::FETCH_ASSOC);
        }

        return false;
    }

    public function getUrlByHash($hash)
    {
        $sql = "SELECT * FROM links where hash=:hash";
        $query = $this->pdo->prepare($sql);

        $query->bindValue(':hash', $hash, \PDO::PARAM_STR);
        $query->execute();

        if ($query->rowCount()) {
            return $query->fetch(PDO::FETCH_ASSOC);
        }
        return 'url_not_found';

    }
}