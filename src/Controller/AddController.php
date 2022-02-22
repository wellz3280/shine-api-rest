<?php
    namespace Weliton\ApiShine\Controller;

use Weliton\ApiShine\Helper\FlashMensage;

use Weliton\ApiShine\Shine\Helper\UrlParam;
use Weliton\ApiShine\Shine\Infra\Persistance\Connection;
use Weliton\ApiShine\Shine\Infra\Persistance\Insert;

class AddController implements InterfaceController
{
    
    use FlashMensage;
    use UrlParam;
    
    public function request(): void
    {
        $pdo = Connection::startConn();
        $table = filter_input(INPUT_POST,'table');
        $values = $this->getParamPost($table,$pdo);
        unset($values[0]);
        $insert = new Insert($pdo);
        $result = $insert->shine($table,$values);
        
        if($result){
            header("Location:/view?table={$table}");
            $this->showMensage('success','Adicionado com Sucesso');
        }
    }
}