<?php
    namespace Weliton\ApiShine\Controller;

use Weliton\ApiShine\Helper\FlashMensage;
use Weliton\ApiShine\Shine\Infra\Persistance\Connection;
use Weliton\ApiShine\Shine\Infra\Persistance\Delete;

class DeleteController implements InterfaceController
{
    use FlashMensage;
    public function request(): void
    {
        $conn = Connection::startConn();

        $table = filter_input(INPUT_GET,'table');
        $parameter = filter_input(INPUT_GET,'parameter');
        $id = filter_input(INPUT_GET,'id',FILTER_VALIDATE_INT);
        
        $delete = new Delete($conn);

        $delete->remove($table,$parameter,$id);

        if($delete){
            header("Location:/view?table={$table}");
            $this->showMensage('danger','Excluido com Sucesso');
        }
    }
}