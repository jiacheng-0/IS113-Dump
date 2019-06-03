<?php
/**
 * Created by PhpStorm.
 * User: Teo Jia Cheng
 * Date: 17/4/2019
 * Time: 4:42 PM
 */

echo "<pre>";
var_dump($_POST);
echo "</pre>";

echo isset($_POST['name']) ? "isset" : "false";
echo "<br/>";
echo empty($_POST['name']) ? "empty" : "false";
echo "<br/>";

echo isset($_POST['school']) ? "isset" : "false";
echo "<br/>";
echo empty($_POST['school']) ? "true" : "false";
echo "<br/>";


//echo empty($_POST['notcreated']) ? "empty" : "false";