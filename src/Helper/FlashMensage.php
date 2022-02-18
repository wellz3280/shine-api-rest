<?php
    namespace Weliton\ApiShine\Helper;

trait FlashMensage
{
    public function showMensage(string $type, string $mensagem):void
    {
        $_SESSION['mensagem'] = $mensagem;
        $_SESSION['tipo_mensagem'] = $type;
    }
}