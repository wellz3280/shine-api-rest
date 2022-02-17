<?php
    namespace Weliton\ApiShine\Shine\Model;

use PDO;
use PDOException;

class Model
{
    protected string $table;
    protected array $data;
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    private function primaryKey(array $data):string
    {   
        foreach($data as $key => $values){
            if($values == 'primary_key'){
                return $pk = "{$key} INT(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,";
            }
        }
    }
    
    private function int(array $data):string
    {
        $aInt = [];
        foreach($data as $key => $values){
            if($values == 'int'){
                $aInt[] = "{$key} INT(11) NOT NULL";
            }
        }

       return $int = implode(",",$aInt).",";

    }

    private function varchar(array $data):string
    {
        $aVarchar = [];
        foreach($data as $key => $values){
            if($values == 'varchar'){
                $aVarchar[] = "{$key} VARCHAR(100) NOT NULL";
            }
        }

       return $varchar = implode(",",$aVarchar).",";

    }

    private function double(array $data):string
    {
        $aDouble = [];
        foreach($data as $key => $values){
            if($values == 'double'){
                $aDouble[] = "{$key} double(10.2) NOT NULL";
            }
        }

       return $double = implode(",",$aDouble);

    }

    protected function create(string $table, array $data):bool
    {

        $pk = $this->primaryKey($data);
        $varchar = $this->varchar($data);
        $int = $this->int($data);
        $double = $this->double($data);

        $table = "CREATE TABLE IF NOT EXISTS {$table} (";

        $sql = $table.$pk.$varchar.$int.$double.");";

        

        try{

            $this->pdo->exec($sql);
            return true;
            
        }catch(PDOException $e){
            echo "ERROR: ".$e->getMessage();
            return false;
        }
    }

    protected function drop(string $table):bool
    {
        
        $sql = "DROP TABLE {$table}";

        try{

             $this->pdo->exec($sql);
            return true;

        }catch(PDOException $e){
            echo "ERROR: ".$e->getMessage();
            return false;
        }
    }
}
