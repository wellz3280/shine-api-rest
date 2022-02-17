<?php

use Weliton\ApiShine\Shine\Infra\Persistance\Connection;
use Weliton\ApiShine\Shine\Infra\Persistance\Insert;

require __DIR__.'/../vendor/autoload.php';

$pdo = Connection::startConn('mysql');

$insert = new Insert($pdo);

$insert->doIt('carros',[
    "argus",
    "standard",
    "preto",
    "fiat",
    2018,
    49.999

]);


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