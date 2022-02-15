<?php
    namespace Weliton\ApiShine\Controller;

use Weliton\ApiShine\Helper\RenderHtml;
use Weliton\ApiShine\Shine\Infra\Persistance\Connection;
use Weliton\ApiShine\Shine\Infra\Persistance\Select;

class  ViewPlusController implements InterfaceController
{
    use RenderHtml;
    
    public function request(): void
    {
        $conn = Connection::startConn('mysql');
        $table = filter_input(INPUT_GET,'table');
        $id = filter_input(INPUT_GET,'id');
        $coluna = filter_input(INPUT_GET,'coluna');
        
        
        $query = new Select($conn);
        $result = $query->thisOne($table,$coluna,$id);

        $index = $query->write("SHOW COLUMNS FROM {$table}");

        echo $this->html('/site/viewPlus.php',[
            "tituloPagina" => $table,
            "data" => $result,
            "indice" => $index,
            
        ]);
    }
}