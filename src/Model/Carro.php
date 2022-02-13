<?php

    namespace Weliton\ApiShine\Model;

use Weliton\ApiShine\Shine\Model\Model;

class Carro extends Model
{   
    public function createTable(string $table, array $data):void
    {
        if($this->create($table,$data)){
            echo "tabela {$table} criada !";
        }else{
            echo "algo deu errado";
        }

    }

    public function dropTable(string $table):void
    {
        if($this->drop($table)){
            echo "tabela {$table} excluida !";
        }else{
            echo "algo deu errado";
        }
    }
}