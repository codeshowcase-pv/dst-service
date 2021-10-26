<?php

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/src/controllers/Controller.php';
require __DIR__ . '/src/data/cities.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

use src\controllers\Controller;

$router = new \Bramus\Router\Router();
$router->setNamespace('controllers');

$router->get('/about', function() {
    echo 'About Page Contents';
});

$router->get('/api/get-local-time', function (){
    $result = Controller::get_local_time();
    echo $result;
});

$router->get('/api/get-utc-time', function () {
    $result = Controller::get_utc_time();
    echo $result;
});

$router->run();