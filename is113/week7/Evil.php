<?php
/**
 * Created by PhpStorm.
 * User: micha
 * Date: 19/2/2019
 * Time: 12:18 PM
 */

//undefined variable $msg;

class Evil {
    private $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name . ' the Evil one!';
    }

    public function greet($name){
        echo "Hi $name, I am " . $this->getName();
    }
}

$evil = new Evil('Layfoo');
$evil->greet('Kyong');