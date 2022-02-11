<?php

    namespace Weliton\ApiShine\Controller;

use PDO;
use Weliton\ApiShine\Helper\RenderHtml;
use Weliton\ApiShine\Infra\Connection;

class UserController implements InterfaceRequest
{   
    use RenderHtml;

    private PDO $pdo;
    private string $table;
    private string $id;

    public function __construct(string $table, int $id)
    {
        $this->table = $table;
        $this->pdo = new Connection();
    }
    
    public function request(): void
    {
        $sql = "SELECT * FROM {$this->table} WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id',$this->id);
        $stmt->execute();

        if($stmt->rowCount() > 0){
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            echo $this->html('teste/teste.php',[
                'usuario' => $user,
                'titulo' => 'Api Shine'
            ]);
        }else{
            throw new \Exception("nenhum usuario encontrado !");
        }

    }
}