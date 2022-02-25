<?php
    namespace Weliton\ApiShine\Controller;

use Weliton\ApiShine\Helper\RenderHtml;
use Weliton\ApiShine\Shine\Infra\Persistance\Connection;
use Weliton\ApiShine\Shine\Infra\Persistance\Select;

class FormInserirLinhaController implements InterfaceController
{
    use RenderHtml;
    public function request(): void
    {
        $table = filter_input(INPUT_GET,'table');

        $conn = Connection::startConn();
        $query = new Select($conn);

        $result = $query->write("SHOW COLUMNS FROM {$table}");
        $datas = [];
        foreach($result as $data){
            $datas[]= $data['Field'];
            unset($datas[0]);
        }

      
        echo $this->html('/site/formInserirLinha.php',[
            "tituloPagina" => $table,
            "tableField" => $datas
        ]);
    }
}