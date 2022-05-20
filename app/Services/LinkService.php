<?php

namespace App\Services;

use App\Repositories\Mysql\MysqlLinkRepository;

class LinkService
{
    private $linkRepo;

    public function __construct(MysqlLinkRepository $linkRepo)
    {
        $this->linkRepo = $linkRepo;
    }

    public function getLinkList()
    {
        return $this->linkRepo->getLinks();
    }

    public function makeLink(): bool
    {
        $domain = $_POST['domain'];
        $url = $_POST['url'];

        $shortenLink = $this->shortenLink();


        return $this->linkRepo->makeLink($domain, $url, $shortenLink);
    }

    public function update($id): bool
    {
        return $this->linkRepo->updateLink($id);
    }

    public function delete($id): bool
    {
        return $this->linkRepo->deleteLink($id);
    }

    public function shortenLink()
    {
        $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

        return substr(str_shuffle(str_repeat($pool, 5)), 0, 10);
    }
}