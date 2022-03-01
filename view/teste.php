<?php

use Weliton\ApiShine\Shine\Helper\UrlParam;
use Weliton\ApiShine\Shine\Infra\Persistance\Connection;
use Weliton\ApiShine\Shine\Infra\Persistance\Delete;
use Weliton\ApiShine\Shine\Infra\Persistance\Insert;
use Weliton\ApiShine\Shine\Infra\Persistance\Select;
use Weliton\ApiShine\Shine\Infra\Persistance\Update;

require __DIR__.'/../vendor/autoload.php';

$pdo = Connection::startConn();
$update = new Update($pdo,'alunos',[6,'valderez','corte e costura','noturno','7e','57',159.99]);

$update->shine();

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

// $carro = new Carro($pdo);

// $data =
// [
    
//     "idAlunos" => "primary_key", 
//     "nome" => "varchar",
//     "curso" => "varchar",
//     "periodo" => "varchar",
//     "turma" => "varchar",
//     "idade" => "int",
//     "valor" => "float",
// ];

// $carro->createTable('alunos',$data);