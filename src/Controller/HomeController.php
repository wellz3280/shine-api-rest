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
        $dbName = new Connection();
        $pdo = Connection::startConn();
        $query = new Select($pdo); 
        
        $result = $query->write("SHOW TABLES");
        
        
        echo $this->html('/site/home.php',[
            'table' => $result,
            'dbname' => $dbName->getDbName()
        ]);
    }
}