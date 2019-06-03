<?php

// Write Car class definition
class Car {

    private $year;
    private $make;
    private $model;
    private $rating;

    /**
     * Car constructor.
     * @param $year
     * @param $make
     * @param $model
     * @param $rating
     */
    public function __construct($year, $make, $model, $rating)
    {
        $this->year = $year;
        $this->make = $make;
        $this->model = $model;
        $this->rating = $rating;
    }

    /**
     * @return mixed
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * @param mixed $year
     */
    public function setYear($year): void
    {
        $this->year = $year;
    }

    /**
     * @return mixed
     */
    public function getMake()
    {
        return $this->make;
    }

    /**
     * @param mixed $make
     */
    public function setMake($make): void
    {
        $this->make = $make;
    }

    /**
     * @return mixed
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @param mixed $model
     */
    public function setModel($model): void
    {
        $this->model = $model;
    }

    /**
     * @return mixed
     */
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * @param mixed $rating
     */
    public function setRating($rating): void
    {
        $this->rating = $rating;
    }
}

?>