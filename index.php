<?php


use App\Container\Container;
use App\Config\Config;

require __DIR__ . '/vendor/autoload.php';

$container = new Container();

$container->set('config', function(){
    return new Config();
});

var_dump($container);