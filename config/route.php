<?php

use Weliton\ApiShine\Controller\HomeController;
use Weliton\ApiShine\Controller\TesteController;
use Weliton\ApiShine\Controller\UserController;
use Weliton\ApiShine\Controller\ViewController;

return[
        '/'=> HomeController::class,
        '/home'=> HomeController::class,
        '/teste' => TesteController::class,
        '/user' => UserController::class,
        '/view' => ViewController::class
    ];
