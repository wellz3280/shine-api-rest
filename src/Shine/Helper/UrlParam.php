<?php
    namespace Weliton\ApiShine\Shine\Helper;

use PDO;
use Weliton\ApiShine\Shine\Infra\Persistance\Select;

trait UrlParam 
{
   

    public function getParamPost(string $table, PDO $pdo):array
    {
        $query = new Select($pdo);
        $result = $query->write("SHOW COLUMNS FROM {$table} ");
        
        $values = [];
        foreach($result as $data){
           $values[] = filter_input(INPUT_POST,$data['Field']);
        } 
        
        return $values;
    
    }   

    public function getParamGet(string $table, PDO $pdo):array
    {
        $query = new Select($pdo);
        $result = $query->write("SHOW COLUMNS FROM {$table} ");
        
        $values = [];
        foreach($result as $data){
           $values[] = filter_input(INPUT_GET,$data['Field']);
        } 
        
        return $values;
    
    }   
}