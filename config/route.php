<?php

use Weliton\ApiShine\Controller\HomeController;
use Weliton\ApiShine\Controller\TesteController;
use Weliton\ApiShine\Controller\UserController;

return[
        '/'=> HomeController::class,
        '/teste' => TesteController::class,
        '/user' => UserController::class
    ];
