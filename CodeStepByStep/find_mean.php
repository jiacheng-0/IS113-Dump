<?php
/**
 * Created by PhpStorm.
 * User: micha
 * Date: 30/1/2019
 * Time: 2:47 PM
 */

function find_mean($num_arr){

    return array_sum($num_arr) / count($num_arr);

}
$num_arr = [2, 4.5, 6.5, 1];

//echo find_mean($num_arr) . "<br>";

$arr = array_slice($num_arr, 2);

echo "<pre>" . var_dump($arr) .  "</pre>";