<?php

use Weliton\ApiShine\Controller\AddController;
use Weliton\ApiShine\Controller\DeleteController;
use Weliton\ApiShine\Controller\FormInserirLinhaController;
use Weliton\ApiShine\Controller\FormUpdateController;
use Weliton\ApiShine\Controller\HomeController;
use Weliton\ApiShine\Controller\JsonController;
use Weliton\ApiShine\Controller\TesteController;
use Weliton\ApiShine\Controller\UserController;
use Weliton\ApiShine\Controller\ViewController;
use Weliton\ApiShine\Controller\ViewPlusController;

return[
        '/teste'=> TesteController::class,
        '/home'=> HomeController::class,
        '/json' => JsonController::class,
        '/user' => UserController::class,
        '/view' => ViewController::class,
        '/viewPlus' => ViewPlusController::class,
        '/delete' => DeleteController::class,
        '/adicionar' => FormInserirLinhaController::class,
        '/addLinha' => AddController::class,
        '/update' => FormUpdateController::class
    ]; 

    