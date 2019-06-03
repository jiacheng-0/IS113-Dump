<?php
/**
 * Created by PhpStorm.
 * User: micha
 * Date: 27/1/2019
 * Time: 8:43 PM
 */

$arr = [];

echo "<pre>";
var_dump($arr);
echo "</pre>";
echo "<br/>";

$arr["kyong"] = "supreme leader";

echo "<pre>";
var_dump($arr);
echo "</pre>";
echo "<br/>";

print_r($arr); echo "<br/>";

$arr["yeow leong"] = "Supreme husband"; echo "<br/>";

print_r($arr); echo "<br/>"; echo "<br/>";


$arr_2 = [];
print_r($arr_2); echo "<br/>";
array_push($arr_2, "prof kyong");
array_push($arr_2, "prof yeow leong");
print_r($arr_2); echo "<br/>";
$arr_2[2] = "Ms vandana";
print_r($arr_2); echo "<br/>";

var_dump(array_key_exists(2, $arr_2)); echo "<br/>";

$arr_3 = [3, 4, 5, 6];
var_dump($arr_3); echo "<br/>";
$arr_3[] = "orange";
var_dump($arr_3); echo "<br/>";
echo "$arr_3[4]"; echo "<br/>";