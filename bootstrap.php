<?php

require_once __DIR__ . '/vendor/autoload.php';

// load environment
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

//load apis
require __DIR__ . '/routes/api.php';

//load redis configuration
require __DIR__ . '/app/Redis/Link.php';

