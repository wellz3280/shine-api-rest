<?php
    namespace Weliton\ApiShine\Controller;

use Weliton\ApiShine\Helper\RenderHtml;

class TesteController implements InterfaceController
{
    use RenderHtml;

    public function request(): void
    {
        echo $this->html('/teste.php',[
            "tituloPagina" => "Testes"
        ]);       
    }
}