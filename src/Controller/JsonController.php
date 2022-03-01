<?php
    namespace Weliton\ApiShine\Controller;

use Weliton\ApiShine\Helper\RenderHtml;
use Weliton\ApiShine\Shine\Infra\Persistance\Connection;
use Weliton\ApiShine\Shine\Infra\Persistance\Select;

class JsonController implements InterfaceController
{
    use RenderHtml;

    public function request(): void
    {
        $table = filter_input(INPUT_GET,'table');
       
        $pdo = Connection::startConn();
        $query = new Select($pdo);
        $result = $query->all($table);

        $json =  json_encode([$table => $result],JSON_UNESCAPED_UNICODE);

        echo $this->html('/site/json.php',[
            "json" => $json
        ]);
    }
}