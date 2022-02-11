<?php
    namespace Weliton\ApiShine\Model;

use PDO;

class User
{
    private static $table = 'user';
    private int $id;


    public static function select(int $id)
    {
        $conn  = new \PDO(DBDRIVE.':host='.DBHOST.';dbname='.DBNAME,DBUSER,DBPASS);
        
        $sql = 'SELECT * FROM user '.self::$table.' WHERE id = :id';
        $stmt = $conn->prepare($sql);    
        $stmt->bindValue(':id',$id);
        $stmt->execute();

        if($stmt->rowCount() > 0){
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }else{
            throw new \Exception("nenhum usuario encontrado !");
        }
    }
}