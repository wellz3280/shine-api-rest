<?php
    namespace Weliton\ApiShine\Shine\Infra\Persistance;

use Exception;
use PDO;
use PDOException;

class Connection
{   
    private string $dbName;

    public function __construct()
    {
        $json = file_get_contents(__DIR__.'/../../../../config/config.json');
        $data = json_decode($json);
        $this->dbName = $data->dbname;
    }

    
    
    public static function startConn():PDO
    {
        $json = file_get_contents(__DIR__.'/../../../../config/config.json');
        $data = json_decode($json);
        
       if($data->driver == "mysql"){
            try{
            
            $conn = new PDO("mysql:host={$data->host};dbname={$data->dbname}",$data->user,$data->pass);
            
            return $conn;

             }catch(PDOException $e){
            echo "Erro: ".$e->getMessage();
            }
       }elseif ($data->driver == "sqlite") {
        try{
            
            $conn = new PDO('sqlite:'.$data->path.$data->dbname.'.sqlite');
            return $conn;
 
         }catch(PDOException $e){
             echo "Erro: ".$e->getMessage();
         }
       }
    }

    public function getDbName()
    {
        return $this->dbName;
    }
}