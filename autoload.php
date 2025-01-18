<?php

namespace App;


class AutoLoader
{
    public static function register()
    {
        spl_autoload_register([__CLASS__, 'autoload']);
    }

    // public static function autoload($class)
    // {
    //     $class = str_replace(__NAMESPACE__ . '\\', '', $class);
    //     $class = str_replace('\\', '/', $class);
    //     require __DIR__ . '/' . $class . '.php';
    // }

    static public function autoload($class)
    {
       // var_dump($class);
        require_once __DIR__.str_replace(array(__NAMESPACE__."\\", "\\"),"/" , $class).".php";
    }
}