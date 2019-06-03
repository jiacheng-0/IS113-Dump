<?php
/**
 * Created by PhpStorm.
 * User: micha
 * Date: 28/1/2019
 * Time: 4:57 PM
 */

$value = 'abc';
echo strlen($value) . "<br/>";

$a = intdiv(11, 2);
echo "11 // 2 = " . $a . "<br/>";

/* and, or , not*/
$is_happy = true;
$is_sunny = false;

$x = $is_happy && $is_sunny;
$y = $is_happy || $is_sunny;

$is_raining = true;

if (!$is_raining) {
    echo 'go swimming';
}

echo var_export($x) . "<br/>";
echo var_export($y) . "<br/>";

$colors = ["red", "green", "blue"];
if (in_array("red", $colors)){
    echo "walala<br/>";
}

if (!in_array("purple", $colors)){
    echo "purple not inside<br/>";
}

foreach ($colors as $value){
    echo "$value<br>";
}

