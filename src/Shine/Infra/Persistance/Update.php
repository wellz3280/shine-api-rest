<?php

    namespace Weliton\ApiShine\Shine\Infra\Persistance;

use PDO;
use PDOException;


class Update 
{
    private PDO $pdo;
    private string $table;
    private array $data;
    

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;    
    
    }

    private function query(string $table):array
    {
        $query = new Select($this->pdo);
        return $result = $query->write("SHOW COLUMNS FROM {$table}");
    }


    private function param(string $table):string
    {
        $result = $this->query($table);
        $fields = [];
        foreach($result as $data){
            $fields[] = $data['Field']."=:".$data['Field'];
            unset($fields[0]);
        }

        return implode(',',$fields);
    }

    private function condition(string $table):string
    {
        $param = $this->query($table);
        
        $arr = [];
        foreach($param as $data){
            $arr[]= $data['Field'];
        }

        return $strParam =  $arr[0]."= :".$arr[0];
    }
    
    private function bValue(string $table):array
    {
        $result = $this->query($table);
        $fields = [];
        foreach($result as $data){
            $fields[] = ":".$data['Field'];
           
        }

        return $fields;
    }

    private function sql(string $table):string
    {   
        $param = $this->param($table);
        $condition = $this->condition($table);
        return $sql = "UPDATE {$table} SET {$param} WHERE {$condition}";

    }


    public function shineUp(string $table,array $data):bool
    {
        try{
            
            $result = $this->pdo->prepare($this->sql($table));
            foreach(array_combine($this->bValue($table),$data) as $k => $v){
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