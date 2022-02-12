<?php
    namespace Weliton\ApiShine\Shine\Infra\Persistance;

use PDO;
use PDOException;

class Connection
{
    private string $driver;
    private string $dbname;
    private string $host;
    private string $user;
    private string $pass;
    
    public function __construct()
    {
        $json = file_get_contents(__DIR__.'/../../../../config/config.json');
        $data = json_decode($json);
        
        $this->driver = $data->driver;
        $this->dbname = $data->dbname;
        $this->host = $data->host;
        $this->user = $data->user;
        $this->pass = $data->pass;
        
        if($this->driver == 'mysql'){
            $this->connMysql();
        }

        if($this->driver == 'Sqlite'){
            $this->connSqlite();
        }

    }

   

    private function connMysql():PDO
    {
        try{
            
            $conn = new PDO("mysql:host={$this->host};dbname={$this->dbname}",$this->user,$this->pass);
            return $conn;

        }catch(PDOException $e){
            echo "Erro: ".$e->getMessage();
        }
    }

    private function connSqlite():PDO
    {
        
        try{
            
            $conn = new PDO('sqlite:'.$this->dbname.'sqlite');
            return $conn;
 
         }catch(PDOException $e){
             echo "Erro: ".$e->getMessage();
         }
    }
}


  $teste = new Connection();