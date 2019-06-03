<?php
/**
 * Created by PhpStorm.
 * User: micha
 * Date: 12/2/2019
 * Time: 1:59 PM
 */

// Define what a cat should be
// - attributes (name, gender, age)

class Cat
{
    private $name;
    private $gender;
    private $age;

    /**
     * Cat constructor.
     * @param $n
     * @param $g
     * @param $a
     */
//    public function __construct($name, $gender, $age)
//    {
//        $this->name = $name;
//        $this->gender = $gender;
//        $this->age = $age;
//    }
    public function __construct($n, $g, $a = 18)
    {
        $this->name = $n;
        $this->gender = $g;
        $this->age = $a;
    }

    public function talk()
    {
        echo 'Meowwwwww <br/>';
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @param mixed $gender
     */
    public function setGender($gender): void
    {
        $this->gender = $gender;
    }

    /**
     * @return int
     */
    public function getAge(): int
    {
        return $this->age;
    }

    /**
     * @param int $age
     */
    public function setAge(int $age): void
    {
        $this->age = $age;
    }


}