<?php

namespace Database;

use PDOException;
use Redis;

class RedisDbConfig
{
    public function handle()
    {
        try {
            $redis = new Redis();

            //host: redis container name
            $redis->connect($_ENV['REDIS_HOST'], $_ENV["REDIS_PORT"]);
            $redis->auth($_ENV['REDIS_PASSWORD']);
            return $redis;
        } catch (PDOException $e) {
            exit("Error: " . $e->getMessage());
        }
    }
}