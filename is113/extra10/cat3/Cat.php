<?php

class Cat
{
    private $name;
    private $age;
    private $gender;
    private $status;

    /**
     * Cat constructor.
     * @param $name
     * @param $age
     * @param $gender
     * @param $status
     */
    public function __construct($name, $age, $gender, $status)
    {
        $this->name = $name;
        $this->age = $age;
        $this->gender = $gender;
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @return mixed
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

//    public function __construct($name, $age, $gender, $status) {
//        // YOUR CODE GOES HERE
//    }
//    public function getName() {
//        // YOUR CODE GOES HERE
//    }
//
//    public function getAge() {
//        // YOUR CODE GOES HERE
//    }
//
//    public function getGender() {
//        // YOUR CODE GOES HERE
//    }
//
//    public function getStatus() {
//        // YOUR CODE GOES HERE
//    }
}

?>