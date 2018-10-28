<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class Util extends ServiceProvider{

    public function __construct(){
    }

    public function RandomString($n)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randstring = '';
        for ($i = 0; $i < $n; $i++) {
            $randstring .= $characters[rand(0, strlen($characters))];
        }
        return $randstring;
    }

}