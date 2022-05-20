<?php
$redis = new Redis();

$redis->connect('url-shorter_cache_1', 6379);
$redis->auth('eYVX7EwVmmxKPCDmwMtyKVge8oLd2t81');

$cacheKey = 'LINKS';
if (!$redis->get($cacheKey)) {

    $redis->set($cacheKey, '1');
    $redis->expire($cacheKey,10);
    $source = 'MySQL Server';

    $instance = new \Database\MysqlDbConfig();
    $pdo = $instance->handle();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT * FROM links";
    $query = $pdo->prepare($sql);
    $query->execute();

    $redis->multi();
    while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
        $links[] = $row;
        $redis->hMSet('link:' . $row['hash'], [
            'domain' => $row['domain'],
            'url' => $row['url'],
            'hash' => $row['hash']
        ]);
    }
    $redis->exec();

} else {
    $source = 'Redis Server';
    $links = $redis->hMGet('link:a', ['domain', 'url']);
}