<?php
    namespace Weliton\ApiShine\Shine\Infra\Persistance;

use PDO;

class Select
{
    private PDO $pdo;
    private string $parameter;
    private string $value;
    private string $table;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;    
    }

    public function thisOne(string $table,string $parameter,string $value):array
    {
        $sql = "SELECT * FROM {$table} WHERE {$parameter} = {$value}";
        $stmt = $this->pdo->query($sql);


        return $result = $stmt->fetch(PDO::FETCH_ASSOC);

    }

    public function all(string $table):array
    {
        $sql = "SELECT * FROM {$table}";
        
        $stmt = $this->pdo->query($sql);
        return $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

    public function write(string $writingQuery):array
    {
        $literalSql = $writingQuery;
        $stmt = $this->pdo->query($literalSql);
        return $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}