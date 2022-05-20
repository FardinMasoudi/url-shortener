<?php

namespace App\Repositories\Mysql;

use Database\MysqlDbConfig;
use PDO;

class MysqlLinkRepository
{
    public $pdo;
    public $littleService;
    public $linkService;

    public function __construct(MysqlDbConfig $dbConfig)
    {
        $this->pdo = $dbConfig->handle();
    }

    public function getLinks()
    {
        $sql = "SELECT domain,url,hash from links";
        $query = $this->pdo->prepare($sql);
        $query->execute();

        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function makeLink($domain, $url, $shortenLink)
    {
        $sql = "INSERT INTO links(domain,url,hash) VALUES (:domain,:url,:hash)";
        $query = $this->pdo->prepare($sql);

        $query->bindParam(':domain', $domain, PDO::PARAM_STR);
        $query->bindParam(':url', $url, PDO::PARAM_STR);
        $query->bindParam(':hash', $shortenLink, PDO::PARAM_STR);

        return $query->execute();
    }

    public function updateLink($id,$domain,$url,$shortenLink)
    {
        $sql = "UPDATE links set domain=:domain,url=:url,hash=:hash where id=:id";
        $query = $this->pdo->prepare($sql);

        $query->bindParam(':domain', $domain, PDO::PARAM_STR);
        $query->bindParam(':url', $url, PDO::PARAM_STR);
        $query->bindParam(':hash', $shortenLink, PDO::PARAM_STR);
        $query->bindParam(':id', $id, PDO::PARAM_STR);

        return $query->execute();
    }

    public function deleteLink($id)
    {
        $sql = "DELETE from links WHERE id=:id";
        $query = $this->pdo->prepare($sql);

        $query->bindParam(':id', $id, PDO::PARAM_STR);

        return $query->execute();
    }
}