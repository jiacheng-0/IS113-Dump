<?php
/**
 * Created by PhpStorm.
 * User: micha
 * Date: 27/1/2019
 * Time: 4:00 AM
 */

$arr = [42, 42, 42, 42];

$unique_num_arr = array();
echo "<pre>";
var_dump($unique_num_arr);
echo "</pre>";
echo '<br/>';
$count = 0;
for ($i = 0; $i < count($arr); $i++) {

    $curr = $arr[$i];
    if (!in_array($curr, $unique_num_arr)) {
        array_push($unique_num_arr, $curr);
    } else {
        $count += 1;
    }
    echo "$count <br/>";
}

//print '<pre>';

var_dump($unique_num_arr);
echo "<br/>";
echo "$count <br/>";
//print '</pre><br/>';

//$arr = [1 => 2, 3 => 5];
//print_r($arr);
//
//print("<br/>");
//$arr[1] = 8;
//print_r($arr);
//
//print("<br/>");
//$arr[1] -= 1;
//print_r($arr);
//
////print("<br/>");
////if (array_key_exists(3, $arr)){
////    print($arr[3]);
////}