<?php
    namespace Weliton\ApiShine\Shine\Infra\Persistance;

use PDO;
use PDOException;

class Connection
{
   
    public static function connMysql():PDO
    {
        $json = file_get_contents(__DIR__.'/../../../../config/config.json');
        $data = json_decode($json);

        try{
            
            $conn = new PDO("mysql:host={$data->host};dbname={$data->dbname}",$data->user,$data->pass);
            return $conn;

        }catch(PDOException $e){
            echo "Erro: ".$e->getMessage();
        }
    }

    public static function connSqlite():PDO
    {
        $json = file_get_contents(__DIR__.'/../../../../config/config.json');
        $data = json_decode($json);
        
        try{
            
            $conn = new PDO('sqlite:'.$data->path.$data->dbname.'.sqlite');
            return $conn;
 
         }catch(PDOException $e){
             echo "Erro: ".$e->getMessage();
         }
    }
}

$teste = Connection::connSqlite();