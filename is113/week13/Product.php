<?php
/**
 * Created by PhpStorm.
 * User: Teo Jia Cheng
 * Date: 2/4/2019
 * Time: 2:59 PM
 */

class Product {
    public $itemName;
    public $category;
    public $price;

    /**
     * Product constructor.
     * @param $itemName
     * @param $category
     * @param $price
     */
    public function __construct($itemName, $name, $startDate , $price)
    {
        $this->itemName = $itemName;
        $this->category = new Category($name, $startDate);
        $this->price = $price;
    }


}