<?php

use Weliton\ApiShine\Controller\TesteController;

require '../vendor/autoload.php';
$path = $_SERVER['REQUEST_URI'];

$routes = require __DIR__.'/../config/route.php';

$controllerClass = $routes[$path];
$controller = new $controllerClass();
$controller->request();