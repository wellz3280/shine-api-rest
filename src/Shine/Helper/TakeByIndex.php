<?php
    namespace Weliton\ApiShine\Shine\Helper;

trait TakeByIndex
{
    public function takeByKey(array $data):array
    {
        $keys = [];
        foreach($data as $key => $datas){
            $keys[] = $key;
        }

        return $keys;
    }

    public function takeByValue(array $data):array
    {
        $values = [];
        foreach($data as $key => $datas){
            $values[] = $datas;
        }

        return $values;
    }
}

