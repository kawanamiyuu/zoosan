<?php

use Kawanamiyuu\Zoosan\HelloWorldMiddleware;
use Kawanamiyuu\Zoosan\ResponseFactoryMiddleware;
use Kawanamiyuu\Zoosan\Zoosan;

require dirname(__DIR__) . '/vendor/autoload.php';

$app = new Zoosan([
    HelloWorldMiddleware::class,
    ResponseFactoryMiddleware::class
]);

$app->listen(8080);
