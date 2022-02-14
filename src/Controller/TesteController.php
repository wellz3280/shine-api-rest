<?php
    namespace Weliton\ApiShine\Controller;

use PDO;
use Weliton\ApiShine\Helper\RenderHtml;
use Weliton\ApiShine\Shine\Infra\Persistance\Connection;

class TesteController implements InterfaceController
{
    use RenderHtml;

    public function request(): void
    {
       

        echo $this->html('/teste.php',[
            'table' => 'tabela',
            'tituloPagina' => 'Lista Notas'
        ]);
    }
}