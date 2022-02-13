<?php


use Weliton\ApiShine\Controller\TesteController;

require '../vendor/autoload.php';
$path = $_SERVER['PATH_INFO'];

$routes = require __DIR__.'/../config/route.php';

$controllerClass = $routes[$path];
$controller = new $controllerClass();
$controller->request();