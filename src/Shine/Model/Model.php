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
                return $pk = "{$key} INT(11) AUTO_INCREMENT PRIMARY KEY,";
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

    private function float(array $data):string
    {
        $aFloat = [];
        foreach($data as $key => $values){
            if($values == 'float'){
                $aFloat[] = "{$key} float NOT NULL";
            }
        }

       return $float = implode(",",$aFloat);

    }

    public function create(string $table, array $data):bool
    {

        $pk = $this->primaryKey($data);
        $varchar = $this->varchar($data);
        $int = $this->int($data);
        $float = $this->float($data);

        $table = "CREATE TABLE IF NOT EXISTS {$table} (";

        $sql = $table.$pk.$varchar.$int.$float.");";

        

        try{

            $this->pdo->exec($sql);
            return true;
            
        }catch(PDOException $e){
            echo "ERROR: ".$e->getMessage();
            return false;
        }
    }

    public function drop(string $table):bool
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
