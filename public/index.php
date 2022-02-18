<?php


require '../vendor/autoload.php';
$path = $_SERVER['PATH_INFO'];

$routes = require __DIR__.'/../config/route.php';
session_start();
$controllerClass = $routes[$path];
$controller = new $controllerClass();
$controller->request();