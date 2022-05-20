<?php

namespace Database;

use PDO;
use PDOException;

const DB_HOST = 'url-shorter_mysql_1';
const DB_USER = 'root';
const DB_PASS = 'php-app';
const DB_NAME = 'urls';

class MysqlDbConfig
{
    public function handle()
    {
        try {
            return new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
        } catch (PDOException $e) {
            exit("Error: " . $e->getMessage());
        }
    }
}