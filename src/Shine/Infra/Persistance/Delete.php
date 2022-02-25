<?php 
    namespace Weliton\ApiShine\Shine\Infra\Persistance;

use PDO;
use PDOException;

class Delete
{
    private PDO $pdo;
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;    
    }

    public function remove(string $table,string $parameter,int $value):bool
    {   
        try{
            $sql = "DELETE FROM {$table} WHERE  {$parameter} = :{$parameter};";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(":{$parameter}",intval($value),PDO::PARAM_INT);

            if($stmt->execute()){
                return true;
            }

        }catch(PDOException $e){
            echo "ERROR: ".$e->getMessage();
            return false;
        }
            
            
    }

}