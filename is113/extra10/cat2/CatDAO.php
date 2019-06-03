<?php

require_once 'Cat.php';

class CatDAO
{

    private $cats;

    // constructor
    public function __construct()
    {
        // Pre-populate static data

        $this->cats = [
            new Cat('Dirty', 12, 'M', 'A'),
            new Cat('Filthy', 7, 'F', 'A'),
            new Cat('Boring', 3, 'M', 'A'),
            new Cat('Needy', 3, 'M', 'P'),
            new Cat('Lazy', 1, 'F', 'P')
        ];

    }

    // whoever needs $cats, call this method off CatDAO object
    public function getCats()
    {
        return $this->cats;
    }

    public function getCatsByStatus($statusCode)
    {
        $specific_cats = [];
        foreach ($this->getCats() as $one_cat) {
            if ($one_cat->getStatus() == $statusCode) {
                array_push($specific_cats, $one_cat);
            }
        }
        return $specific_cats;
    }

}