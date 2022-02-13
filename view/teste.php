<?php

   // header('Content-Type: application/json');
   // echo $userJson;

use Weliton\ApiShine\Model\Carro;

require '../vendor/autoload.php';
$teste = new Carro();
$teste->dropTable('testecarros');
// $teste->createTable('testecarros',[
//     "idCarro" => "primary_key",
//     "nome" => "varchar",
//     "modelo" => "varchar",
//     "marca" => "varchar",
//     "ano" => "int",
//     "valor" => "float",

// ]);