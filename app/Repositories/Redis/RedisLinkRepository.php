<?php

namespace App\Repositories\Redis;

use Database\RedisDbConfig;

class RedisLinkRepository
{
    public $redis;

    public function __construct(RedisDbConfig $redisDbConfig)
    {
        $this->redis = $redisDbConfig->handle();
    }

    public function getUrlByHash($hash)
    {
        return $this->redis->hMGet('link:' . $hash, ['domain', 'url']);
    }
}