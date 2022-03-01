<?php

    namespace Weliton\ApiShine\Controller;

use Weliton\ApiShine\Helper\FlashMensage;
use Weliton\ApiShine\Shine\Helper\UrlParam;
use Weliton\ApiShine\Shine\Infra\Persistance\Connection;
use Weliton\ApiShine\Shine\Infra\Persistance\Update;

class UpdateController implements InterfaceController
{
    use UrlParam;
    use FlashMensage;

    public function request(): void
    {
        $pdo = Connection::startConn();
        $table = filter_input(INPUT_POST,'table');
        
        $valuesParan = $this->getParamPost($table,$pdo);
        $update = new Update($pdo);
        $update->shineUp($table,$valuesParan);
        
        if($update){
            
            header("Location:/view?table={$table}");
            $this->showMensage('success','Adicionado com Sucesso');

        }else{
            
            header("Location:/view?table={$table}");
            $this->showMensage('danger','Erro ao Atualizar ! ');
        }
        
    }
}