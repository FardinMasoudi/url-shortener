<?php
$redis = new Redis();

$redis->connect($_ENV['REDIS_HOST'], $_ENV["REDIS_PORT"]);
$redis->auth($_ENV['REDIS_PASSWORD']);
$cacheKey = 'LINKS';
//$redis->del('LINKS');
if (!$redis->get($cacheKey)) {
    $redis->set($cacheKey, '1');
    $redis->expire($cacheKey, 10);
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

json_encode(var_dump($source));

