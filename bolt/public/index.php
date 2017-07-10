<?php
// Assuming this is in public/index.php and Bolt is located in vendor/bolt/bolt/
$map = [
    '/another' => new AnotherApplication(),
    '/blog'    => require __DIR__ . '/../vendor/bolt/bolt/app/bootstrap.php'
];
$app = (new Stack\Builder())
    ->push('Stack\UrlMap', $map)
    ->resolve($app);

Stack\run($app);

/** @var Silex\Application|false $app */
$app = require __DIR__ . '/../vendor/bolt/bolt/app/web.php';

// If we're running PHP's built-in webserver, `web.php` returns `false`,
// meaning the path is a file. If so, we pass it along.
if ($app === false) {
    return false;
}

$app->run();
