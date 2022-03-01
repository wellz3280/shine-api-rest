<?php

    namespace Weliton\ApiShine\Shine\Infra\Persistance;

use PDO;
use PDOException;


class Update 
{
    private PDO $pdo;
    private string $table;
    private array $data;
    

    public function __construct(PDO $pdo, string $table,array $data)
    {
        $this->pdo = $pdo;    
        $this->table = $table;    
        $this->data = $data;    
    }

    private function query():array
    {
        $query = new Select($this->pdo);
        return $result = $query->write("SHOW COLUMNS FROM {$this->table}");
    }


    private function param():string
    {
        $result = $this->query();
        $fields = [];
        foreach($result as $data){
            $fields[] = $data['Field']."=:".$data['Field'];
            unset($fields[0]);
        }

        return implode(',',$fields);
    }

    private function condition():string
    {
        $param = $this->query();
        
        $arr = [];
        foreach($param as $data){
            $arr[]= $data['Field'];
        }

        return $strParam =  $arr[0]."= :".$arr[0];
    }
    
    private function bValue():array
    {
        $result = $this->query();
        $fields = [];
        foreach($result as $data){
            $fields[] = ":".$data['Field'];
           
        }

        return $fields;
    }

    private function sql():string
    {   
        $param = $this->param();
        $condition = $this->condition();
        return $sql = "UPDATE {$this->table} SET {$param} WHERE {$condition}";

    }


    public function shine():bool
    {
        try{
            
            $result = $this->pdo->prepare($this->sql());
            foreach(array_combine($this->bValue(),$this->data) as $k => $v){
                $result->bindValue($k,$v);
            }

            $result->execute();
            return true;

        }catch(PDOException $e){
            "ERROR: ".$e->getMessage();
            return false;

        }
    }
}