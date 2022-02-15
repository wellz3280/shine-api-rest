<?php
    namespace Weliton\ApiShine\Shine\Infra\Persistance;

use Exception;
use PDO;
use PDOException;

class Connection
{   
    
    public static function startConn(string $service):PDO
    {
        $json = file_get_contents(__DIR__.'/../../../../config/config.json');
        $data = json_decode($json);
  
       if($service == "mysql"){
            try{
            
            $conn = new PDO("mysql:host={$data->host};dbname={$data->dbname}",$data->user,$data->pass);
            
            return $conn;

             }catch(PDOException $e){
            echo "Erro: ".$e->getMessage();
            }
       }elseif ($service == "sqlite") {
        try{
            
            $conn = new PDO('sqlite:'.$data->path.$data->dbname.'.sqlite');
            return $conn;
 
         }catch(PDOException $e){
             echo "Erro: ".$e->getMessage();
         }
       }
    }
}