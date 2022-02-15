<?php 
    namespace Weliton\ApiShine\Controller;

use PDO;
use Weliton\ApiShine\Helper\RenderHtml;
use Weliton\ApiShine\Shine\Infra\Persistance\Connection;
use Weliton\ApiShine\Shine\Infra\Persistance\Select;

class HomeController implements InterfaceController
{
    use RenderHtml;
    private PDO $pdo;
    public function request(): void
    {   
        $pdo = Connection::startConn('mysql');
        $query = new Select($pdo); 
        
        $result = $query->write("show tables");
        
        
        echo $this->html('/site/home.php',[
            'table' => $result,
            'tituloPagina' => 'Home'
        ]);
    }
}