<?php
    namespace Weliton\ApiShine\Shine\Infra\Persistance;

use PDO;
use PDOException;
use Weliton\ApiShine\Shine\Helper\TakeByIndex;

class Insert extends Select
{
    private PDO $pdo;
    private string $table;
    private array $data;
    use TakeByIndex;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
        parent::__construct($this->pdo);
    }

    private function getFieldsStr(string $table):string
    {
        // pega as colunas da tabela e transforma em string
        $filds = [];
        $query = $this->write("SHOW COLUMNS FROM {$table}");
        foreach($query as $data){
            $filds[] = $data['Field'];
            unset($filds[0]);
        }
        
        return $strFields = implode(",", $filds);
    }

    private function getParamStr(string $data):string
    {
        // preparando a string para servir de parâmetro
        $aData = explode(",",$data);
        $param = [];
        
        foreach($aData as $datas){
            $param[] = ":".$datas;
        }
        
        return $strParam = implode(",",$param);
    }

    private function getParamArray(string $data):array
    {
        // preparando o array para servir de parâmetro
        $aData = explode(",",$data);
        $param = [];
        
        foreach($aData as $datas){
            $param[] = ":".$datas;
        }
        
        return $param;
    }
    
    public function shine(string $table,array $data):bool
    {
        try{
            $query = "INSERT INTO {$table} (";
            
            $filds = $this->getFieldsStr($table);
            
            $arrayFields = $this->getParamArray($filds);
            
            $values = " VALUES ({$this->getParamStr($filds)});";
            
            $sql = $query.$filds.") ".$values;
            
            $result = $this->pdo->prepare($sql);
            
            foreach(array_combine($arrayFields,$data)as $p => $v){
                
                if(is_string($v)){
                    $result->bindValue("{$p}",$v,PDO::PARAM_STR);
                }
                
                if(is_int($v)){
                    $result->bindValue("{$p}",intval($v),PDO::PARAM_INT);
                }
                
                if(is_float($v)){
                    $result->bindValue("{$p}",floatval($v));
                }
                
                if(is_double($v)){
                    $result->bindValue("{$p}",doubleval($v));
                }
            }

            $result->execute();
           
            return true;
        
        }catch(PDOException $e){
            echo "ERROR: ". $e->getMessage();
        }
    }   
}