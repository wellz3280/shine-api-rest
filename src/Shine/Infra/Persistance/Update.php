<?php
    namespace Weliton\ApiShine\Shine\Infra\Persistance;

use LDAP\Result;
use PDO;
use Weliton\ApiShine\Shine\Helper\UrlParam;

class Update
{
    private PDO $pdo;
   
    
    use UrlParam;
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;    
    }

    // $sql = "UPDATE users SET name=:name, surname=:surname, sex=:sex WHERE id=:id";



}