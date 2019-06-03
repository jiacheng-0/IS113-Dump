<?php
/**
 * Created by PhpStorm.
 * User: micha
 * Date: 29/1/2019
 * Time: 12:04 AM
 */

//require 'Person.php';

class Person
{
    public $name;
    public $age;

    function __construct($name, $age)
    {
        $this->name = $name;
        $this->age = $age;
        echo "constructing {$this->name}, {$this->age}<br/>";
    }

    function isOld(){
        return $this->age > 75;
    }
}
//
//$first = new Person('Vivian', 21);
////$first->name = 'Vivian';
////$first->age = '21';
//
//$second = new Person('Charis', 90);
////$second->name = 'Charis';
////$second->age = '20';
//
//$list = [$first, $second];
//foreach ($list as $person){
////    echo $person->name . "<br/>";
//    echo "Is {$person->name} old? ";
//    var_export($person->isOld());
//    echo "<br/>";
//}
