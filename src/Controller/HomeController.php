<?php 
    namespace Weliton\ApiShine\Controller;

use PDO;
use Weliton\ApiShine\Helper\RenderHtml;
use Weliton\ApiShine\Shine\Infra\Persistance\Connection;

class HomeController implements InterfaceController
{
    use RenderHtml;

    public function request(): void
    {   
        $conn = Connection::connMysql();
        $sql = "show tables";
        $stmt = $conn->query($sql);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        echo $this->html('/site/home.php',[
            'table' => $result,
            'tituloPagina' => 'Home'
        ]);
    }
}