<?php
    namespace Weliton\ApiShine\Shine\Infra\Persistance;

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


}