<?php

use Weliton\ApiShine\Shine\Helper\UrlParam;
use Weliton\ApiShine\Shine\Infra\Persistance\Connection;
use Weliton\ApiShine\Shine\Infra\Persistance\Delete;
use Weliton\ApiShine\Shine\Infra\Persistance\Insert;
use Weliton\ApiShine\Shine\Infra\Persistance\Select;
use Weliton\ApiShine\Shine\Infra\Persistance\Update;
use Weliton\ApiShine\Shine\Model\Model;

require __DIR__.'/../vendor/autoload.php';

$pdo = Connection::startConn();

$model = new Model($pdo);
$model->create('teste1',[
    "idAlunos" => "primary_key", 
    // "nome" => "varchar",
    // "curso" => "varchar",
    // "periodo" => "varchar",
    "turma" => "varchar",
    "idade" => "int",
    "valor" => "float",
]);
// $update = new Update($pdo);

// $update->shineUp('alunos',[6,'valderez','corte e costura','noturno','7e','57',159.99]);

// $insert = new Insert($pdo);

// $insert->doIt('carros',[
//     "teste",
//     "standard",
//     "preto",
//     "fiat",
//     2018,
//     49.999

// ]);


// echo "<h1>".$tituloPagina."</h1>";

// $carro = new Model($pdo);

// $data =
// [
    
    // "idAlunos" => "primary_key", 
    // "nome" => "varchar",
    // "curso" => "varchar",
    // "periodo" => "varchar",
    // "turma" => "varchar",
    // "idade" => "int",
    // "valor" => "float",
// ];

// $carro->create('alunos',$data);