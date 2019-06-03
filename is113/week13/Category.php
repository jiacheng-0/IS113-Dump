<?php
/**
 * Created by PhpStorm.
 * User: Teo Jia Cheng
 * Date: 2/4/2019
 * Time: 2:59 PM
 */

class Category {

    public $name;
    public $startDate;

    /**
     * Category constructor.
     * @param $name
     * @param $startDate
     */
    public function __construct($name, $startDate)
    {
        $this->name = $name;
        $this->startDate = $startDate;
    }

}