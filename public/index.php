<?php

    namespace Weliton\ApiShine;

use Weliton\ApiShine\Helper\RenderHtml;
require '../vendor/autoload.php';
class index
{
    use RenderHtml;

    public  function request()
    {
        echo $this->html('/teste.php',[
            'nota' => 'teste',
            'tituloPagina' => 'Lista Notas'
        ]);
    }
}

$index = new index();
$index->request();