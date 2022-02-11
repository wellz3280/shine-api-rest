<?php
   namespace Weliton\ApiShine\Helper;

trait RenderHtml
{
    public function html(string $path, array $data):string
    {
        extract($data);
        ob_start();
         require __DIR__. '/../../view/'.$path;
         $html = ob_get_clean();
         
         return $html;
    }
}