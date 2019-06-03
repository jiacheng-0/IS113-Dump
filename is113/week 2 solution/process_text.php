<?php

$name = "hahaha"; //string
$school = "smu"; //string
$num1 = 55; //number

$str1 = $name . ' ' . $school . ' ' . $num1;
echo $str1;
// exit;

var_dump($_GET);
var_dump($_GET['gender']);
// print_r($_GET);

foreach($_GET['gender'] as $item)
  echo $item;

/* */
#

//retrieve from array
$mood = $_GET['mood'];
echo $mood;

// $bool_expr = 5 > 4;

$var = $bool_expr ?  'value for true' : 'value for false';
if ( $bool_expr ) {
  $var = 'value for true';
} else {
  $var = 'value for false';
}
?>