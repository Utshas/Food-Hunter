<?php
namespace App\Utility;

class Utility{
    public static function var_dump($data){
        echo "<pre>";
        var_dump($data);
        echo "</pre>";
    }


    public static function redirect($data){
        header('Location:'.$data);

    }




}