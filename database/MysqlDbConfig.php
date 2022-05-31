<?php

namespace Database;

use PDO;
use PDOException;

class MysqlDbConfig
{
    public function handle()
    {
        try {
            return new PDO("mysql:host=" . $_ENV['DB_HOST'] . ";dbname=" . $_ENV['DB_DATABASE'], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD']);
        } catch (PDOException $e) {
            exit("Error: " . $e->getMessage());
        }
    }
}