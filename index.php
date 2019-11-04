<?php

use App\Container\Container;
use App\Config\Config;
use App\Controllers\HomeController;
use App\Database\Database;

require __DIR__ . '/vendor/autoload.php';

$container = new Container();

$container->share('config', function($container)  {
    return new Config();
});

$container->share('database', function($container)  {
    return new Database($container->config);
});

//dump($container->database->connect());

//$container->get('database');

dump((new HomeController($container->config, $container->database))->index());
