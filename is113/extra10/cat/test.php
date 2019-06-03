<?php
/**
 * Created by PhpStorm.
 * User: Teo Jia Cheng
 * Date: 12/3/2019
 * Time: 12:29 PM
 */


require_once "Cat.php";

$cat1 = new Cat("James", 69, "Male", "Single");
echo $cat1->getName();