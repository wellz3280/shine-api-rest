<?php
    namespace Weliton\ApiShine\Controller;

use Weliton\ApiShine\Controller\InterfaceController;
use Weliton\ApiShine\Helper\FlashMensage;
use Weliton\ApiShine\Shine\Infra\Persistance\Connection;
use Weliton\ApiShine\Shine\Model\Model;

class CreateTable implements InterfaceController
{
    use FlashMensage;
    public function request(): void
    {
       $table = filter_input(INPUT_POST,'nameTable',FILTER_SANITIZE_STRING);
       $filterParams = array_filter($_POST);
        
       $keys = []; //campos da tabela
       $values = []; //tipo de dado

      for($i = 1; $i <= count($filterParams);$i++){
        $keys[] = $filterParams["campo{$i}"];
        $values[] = $filterParams["tipo{$i}"];

     }

     $unitArr = array_combine($keys,$values);
     $conn = Connection::startConn();
     $create = new Model($conn);

     $create->create($table,array_filter($unitArr));
     
     if($create){
        header("Location:/adicionar?table={$table}");
        // $this->showMensage('success',"Tabela {$table} criada!");
    }

    }
}