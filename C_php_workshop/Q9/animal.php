<?php

class Animal
{
    // YOUR CODE HERE
    public $name;
    public $age;
    public $sound;

    public function __construct($name="Abandoned", $age = 7, $sound = 'pss')
    {
        $this->name = $name;
        $this->age = $age;
        $this->sound = $sound;
    }
    public function __toString()
    {
        // TODO: Implement __toString() method.
        return $this->name . " is of age " . $this->age . ", and makes this sound : " . $this->sound;
    }
}

$animals = [
    new Animal("Dog", 10, "Bark!"),
    new Animal("Cat", 5, "Meowww..."),
    new Animal("Hamster", 2, "Squeak squeak bruh"),

    new Animal("Shu Min", 19, "I don't want present")
//    new Animal()
];

echo "<table border='2' style='border-collapse: collapse' bgcolor='#add8e6'>";
foreach ($animals as $animal) {
    // YOUR CODE HERE
    echo "<tr><td>". $animal . "</td></tr>";}
echo "<table>";
