<?php

/*
1.  Do NOT change the existing code.
2.  Do NOT add attributes to this class.
3.  Read TestBasket.php and ADD the missing methods after line 40.
*/

class Basket
{

    // ATTRIBUTES
    // name of this basket
    private $name;

    // associative array where key is item (String) and value is quantity (int)
    private $itemQtyArr;

    // CONSTRUCTOR
    public function __construct($name)
    {
        $this->name = $name;
        $this->itemQtyArr = [];
    }

    // METHODS
    public function getSummary()
    {
        $summary = "Basket '$this->name' [ ";

        if (count($this->itemQtyArr) == 0) {
            $summary .= 'nothing.';
        } else {
            foreach ($this->itemQtyArr as $item => $qty) {
                $summary .= "$qty $item, ";
            }

        }
        $summary .= ']';

        return $summary;
    } // end function getSummary

    // ADD MISSING METHODS HERE

    public function get($itemInput)
    {
        $count = 0;
        foreach ($this->itemQtyArr as $item => $qty) {
            if ($item == $itemInput) {
                return $qty;
            }
        }
        return $count;
    }

    public function add($newItem)
    {
        if (array_key_exists($newItem, $this->itemQtyArr)) {
            $this->itemQtyArr[$newItem]++;
        } else {
            $this->itemQtyArr[$newItem] = 1;
        }
    }

    public function remove($removeItem)
    {
        if (array_key_exists($removeItem, $this->itemQtyArr)) {
            unset($this->itemQtyArr[$removeItem]);
            return true;
        }
        return false;
    }

} // end class Basket