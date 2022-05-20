<?php

namespace App\Services;

use App\Repositories\Redis\RedisLinkRepository;

class HashLinkService
{
    private $linkRepo;

    public function __construct(RedisLinkRepository $redisLinkRepository)
    {
        $this->linkRepo = $redisLinkRepository;
    }

    public function getUrlByHash($hash)
    {
        return $this->linkRepo->getUrlByHash($hash);
    }

}