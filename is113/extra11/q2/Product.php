<?php
class Product {

    private $productName;
    private $categoryName;
    private $quantity;  // int
    private $price; // float

    /**
     * Product constructor.
     * @param $productName
     * @param $categoryName
     * @param $quantity
     * @param $price
     */
    public function __construct($productName, $categoryName, $quantity, $price)
    {
        $this->productName = $productName;
        $this->categoryName = $categoryName;
        $this->quantity = $quantity;
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getProductName()
    {
        return $this->productName;
    }

    /**
     * @return mixed
     */
    public function getCategoryName()
    {
        return $this->categoryName;
    }

    /**
     * @return mixed
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

}