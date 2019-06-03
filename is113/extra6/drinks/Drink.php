<?php

/*
Implement the Drink class.
1. It has 3 attributess: $name, $image, $price
2. Implement a constructor that takes in values for the 3 attributes.
3. Write Getter & Setter methods for the 3 attributes.
*/

class Drink {
    private $name;
    private $image;
    private $price;

    // Constructor
    public function __construct($n, $i, $p) {
        // YOUR CODE GOES HERE
        $this->name = $n;
        $this->image = $i;
        $this->price = $p;
    }

    //============ Getters & Setters ============
    /**
     * @return mixed
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getImage(): string
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage(string $image): void
    {
        $this->image = $image;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price): void
    {
        $this->price = $price;
    }

    //===========================================
}

?>