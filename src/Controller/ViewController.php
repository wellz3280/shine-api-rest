<?php
    namespace Weliton\ApiShine\Controller;

use PDO;
use Weliton\ApiShine\Helper\RenderHtml;
use Weliton\ApiShine\Shine\Helper\TakeByIndex;
use Weliton\ApiShine\Shine\Infra\Persistance\Connection;
use Weliton\ApiShine\Shine\Infra\Persistance\Select;

class ViewController implements InterfaceController
{
    use RenderHtml;
    use TakeByIndex;

    public function request(): void
    {
        $conn = Connection::startConn();
        $table = filter_input(INPUT_GET,'table',FILTER_SANITIZE_STRING);    
        
        $query = new Select($conn);

        $result = $query->all($table);
        $resultColumns =  $query->write("SHOW COLUMNS FROM {$table}");
        $columnName = $this->takeByValue($resultColumns[0]);
        
        echo $this->html('/site/view.php',[
            "tituloPagina" => $table,
            "data" => $result,
            "columns" => $resultColumns,
            "columnName" => $columnName[0]

        ]);
    
    }
}