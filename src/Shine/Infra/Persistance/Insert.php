<?php
    namespace Weliton\ApiShine\Shine\Infra\Persistance;

use PDO;
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
        $aData = explode(",",$data);
        $param = [];
        
        foreach($aData as $datas){
            $param[] = ":".$datas;
        }
        
        return $strParam = implode(",",$param);
    }

    private function getParamArray(string $data):array
    {
        // pegandando 
        $aData = explode(",",$data);
        $param = [];
        
        foreach($aData as $datas){
            $param[] = ":".$datas;
        }
        
        return $param;
    }

    public function doIt(string $table,array $data):void
    {

        $query = "INSERT INTO {$table} (";
        
        $filds = $this->getFieldsStr($table).")";
        
        $arrayFields = $this->getParamArray($filds);
        
        $values = " VALUES ({$this->getParamStr($filds)};";
        
        echo $sql = $query.$filds.$values;
        
        $result = $this->pdo->prepare($sql);
        
        foreach(array_combine($arrayFields,$data)as $p => $v){
            $result->bindValue("{$p}",$data,PDO::PARAM_STR);
        }
        $result->execute();
        
        // foreach($arrayFields as $datas){
        //     $insert->bindParam($datas,);
        // }

    }   



}