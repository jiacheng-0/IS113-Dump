<?php
/**
 * Created by PhpStorm.
 * User: micha
 * Date: 29/1/2019
 * Time: 12:47 AM
 */

//require_once "Person.php";

//spl_autoload_register("myautoloader");
//function myautoloader($classname){
//    require_once "{$classname}.php";
//}

spl_autoload_register(
    function($classname){
        require_once "{$classname}.php";
    }
);
