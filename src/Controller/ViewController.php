<?php
    namespace Weliton\ApiShine\Controller;

use PDO;
use Weliton\ApiShine\Helper\RenderHtml;
use Weliton\ApiShine\Shine\Infra\Persistance\Connection;

class ViewController implements InterfaceController
{
    use RenderHtml;

    public function request(): void
    {
        $conn = Connection::connMysql();
        $table = filter_input(INPUT_GET,'table',FILTER_SANITIZE_STRING);    
        
        $sqlConlumns = "SHOW COLUMNS FROM {$table}";
        $stmtColumns = $conn->query($sqlConlumns);
        $resultColumns = $stmtColumns->fetchAll(PDO::FETCH_ASSOC);

        $sql = "SELECT * FROM {$table}";
        $stml = $conn->query($sql);
        $result = $stml->fetchAll(PDO::FETCH_ASSOC);

        echo $this->html('/site/view.php',[
            "tituloPagina" => $table,
            "data" => $result,
            "columns" => $resultColumns
        ]);
    
    }
}