<?php

require_once 'common.php';

/* 
 * grabs the value send over by the dropdown list
 * the format will be <product's id>-<size> 
 * e.g. '1-M'
 */

$items = $_POST['item'];

$dao = new ProductDAO();

var_dump($items);
// YOUR CODE GOES HERE
foreach ($items as $one_item) {
    $arr = explode('-', $one_item);
    $dao->reduceInventory($arr[0], $arr[1]);
}

//header('Location: display.php');
//return;

?>
