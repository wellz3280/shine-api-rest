<?php
    namespace Weliton\ApiShine\Controller;

use Weliton\ApiShine\Helper\FlashMensage;
use Weliton\ApiShine\Shine\Infra\Persistance\Connection;
use Weliton\ApiShine\Shine\Model\Model;

class DropTableController implements InterfaceController
{
    use FlashMensage;

    public function request(): void
    {
        $table = filter_input(INPUT_GET,'table',FILTER_SANITIZE_STRING);

        $pdo = Connection::startConn();

        $model = new Model($pdo);
        $drop = $model->drop($table);

        if($drop){
            header("Location:/home");
            $this->showMensage('danger',"Tabela {$table} Excluida!");
        }
    }
}