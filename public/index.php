<?php

header("Content-Type: application/json");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$app = require __DIR__ . '/../bootstrap.php';

$app->run();



