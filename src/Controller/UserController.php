<?php

    namespace Weliton\ApiShine\Controller;

use Exception;
use PDO;
use Weliton\ApiShine\Helper\RenderHtml;
use Weliton\ApiShine\Shine\Infra\Persistance\Connection;

class UserController implements InterfaceController
{
    use RenderHtml;
    private PDO $pdo;

    public function request(): void
    {
        $table = filter_input(INPUT_GET,'user');
        $conn = new PDO("mysql:host=localhost;dbname=testShine",'root','');
        $sql = "SELECT * FROM user";
        $stmt = $conn->query($sql);

        if($stmt->rowCount() > 0){
           $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $json =  json_encode($result);

           echo $this->html('/teste.php',[
            'table' => $table,
            'userJson' => $json,
            'tituloPagina' => 'Lista Notas'
        ]); 
        
        }else{
            throw new \Exception("Nenhum dado Existente !!");
            
        }

        
    }
}