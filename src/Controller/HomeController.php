<?php 
    namespace Weliton\ApiShine\Controller;

use Weliton\ApiShine\Helper\RenderHtml;

class HomeController implements InterfaceController
{
    use RenderHtml;

    public function request(): void
    {
        echo $this->html('/site/home.php',[
         
            'tituloPagina' => 'Home'
        ]);
    }
}