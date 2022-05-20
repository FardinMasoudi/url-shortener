<?php

require_once __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/routes/api.php';

$app = new \App\Application();


//
require __DIR__ . '/app/Redis/Link.php';
return $app;
