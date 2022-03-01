<?php
    namespace Weliton\ApiShine\Shine\Helper;

trait TakeByIndex
{
    public function takeByKeyAssoc(array $data):array
    {
        $keys = [];
        foreach($data as $key => $datas){
            $keys[] = $key;
        }

        return $keys;
    }

    public function takeByValueAssoc(array $data):array
    {
        $values = [];
        foreach($data as $key => $datas){
            $values[] = $datas;
        }

        return $values;
    }

}

