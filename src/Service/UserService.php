<?php
    namespace Weliton\ApiShine\Service;

use Weliton\ApiShine\Model\User;

class UserService
{
    public function get($id = null)
    {
        if($id){
           return User::select($id);
        }else{
            echo "algo deu errado";
            // return User::selectAll();
        }
    }

    public function post()
    {
        # code...
    }

    public function update()
    {
        # code...
    }

    public function delete()
    {
        # code...
    }
}