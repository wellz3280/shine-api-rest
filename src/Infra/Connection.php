<?php
    namespace Weliton\ApiShine\Infra;

use PDO;

class Connection
{
    private string $driver;
    private string $host;
    private string $dbname;
    private string $user;
    private string $pass;
    
  
    public function __construct()
    {
        $json = file_get_contents('./config/config.json');
        $data = json_decode($json);
        
        // $data =  [
        //     "driver" => $data->driver,
        //    "host" => $data->host,
        //    "dbname" =>$data->dbname,
        //     "user" => $data->user,
        //    "pass" => $data->pass,
        //    "path" => $data->path,
        // ];

        $this->driver = $data->driver;
        $this->host = $data->host;
        $this->dbname = $data->dbname;
        $this->user = $data->user;
        $this->pass = $data->pass;
        
        
        if($this->driver == 'mysql'){
            $this->connMysql();        
        }
        
        if($this->driver == 'sqlite'){
            $this->connSqlite();
        }
    }

    private function connMysql():PDO
    {
        try{
            
            $conn  = new \PDO($this->driver.':host='.$this->host.';dbname='.$this->dbname,
            $this->user,$this->pass);
            echo "conectado";
            return $conn;

        }catch(\PDOException $e){
            echo "Error: ".$e->getMessage();
        }
    }

    private function connSqlite():PDO
    {
        try{
            
            $conn = new \PDO($this->driver.':'.$this->dbname);
            return $conn;
        
        }catch(\PDOException $e){
            echo "Error: ".$e->getMessage();
        }
    }
}