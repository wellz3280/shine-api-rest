<?php
    namespace Weliton\ApiShine\Controller;

use Weliton\ApiShine\Helper\RenderHtml;

class FormCreateTableController implements InterfaceController
{
    use RenderHtml;
    public function request(): void
    {
        echo $this->html('/site/formCreateTable.php',[
            'titulPagina' => 'criar'
        ]);
    }
}