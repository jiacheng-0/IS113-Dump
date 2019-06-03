<?php
/**
 * Created by PhpStorm.
 * User: micha
 * Date: 27/1/2019
 * Time: 10:53 PM
 */

$colors = ["red", "green", "blue"];

echo "<pre>";
var_dump($colors);
echo "</pre>";
echo "<br/>";

$colors[] = "purple";
//array_push($colors, "orange");
echo "<pre>";
var_dump($colors);
echo "</pre>";
echo "<br/>";