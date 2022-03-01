<?php
    namespace Weliton\ApiShine\Controller;

use Weliton\ApiShine\Helper\FlashMensage;
use Weliton\ApiShine\Helper\RenderHtml;
use Weliton\ApiShine\Shine\Infra\Persistance\Connection;
use Weliton\ApiShine\Shine\Infra\Persistance\Select;

class FormUpdateController implements InterfaceController
{
    use RenderHtml;
    use FlashMensage;

    public function request(): void
    {
        $table = filter_input(INPUT_GET,'table');
        $parameter = filter_input(INPUT_GET,'parameter');
        $id = filter_input(INPUT_GET,'id',FILTER_VALIDATE_INT);

        $conn = Connection::startConn();

        $query = new Select($conn);
        $columns = $query->write("SHOW COLUMNS FROM {$table}");
        $keys = [];
        
        foreach($columns as $value){
            $keys[]=$value['Field'];
        }

        $values = $query->thisOne($table,$parameter,$id);
       
        echo $this->html('/site/formUpdate.php',[
            "tituloPagina" => $table,
            "keys" => $keys,
            "values" => $values,
            "idColumn" => $keys[0]  
        ]);

        
    }
}