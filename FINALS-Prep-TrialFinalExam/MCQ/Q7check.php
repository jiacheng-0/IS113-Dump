<?php
/**
 * Created by PhpStorm.
 * User: Teo Jia Cheng
 * Date: 17/4/2019
 * Time: 4:29 PM
 */

$arr = ["apple" => ''];

echo empty($arr['apple']) ? "EMPTY" : "false";
echo "<br/>";

echo in_array('', $arr) ? "in_array" : "false";
echo "<br/>";
