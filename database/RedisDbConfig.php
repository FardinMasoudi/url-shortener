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
            $redis->connect('url-shorter_cache_1', 6379);
            $redis->auth('eYVX7EwVmmxKPCDmwMtyKVge8oLd2t81');
            return $redis;
        } catch (PDOException $e) {
            exit("Error: " . $e->getMessage());
        }
    }
}