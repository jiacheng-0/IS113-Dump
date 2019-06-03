<?php
/**
 * Created by PhpStorm.
 * User: micha
 * Date: 9/2/2019
 * Time: 11:53 AM
 */

$arr = ["james" => 4, "jia jun" => 4.4, "jia cheng" => 3];

echo "is james inside? " . print_r(in_array("james", $arr)) . '<br>';
echo "is james inside? " . print_r(array_key_exists("james", $arr)) . '<br>';
echo "is james inside? " . print_r(array_key_exists(4, $arr)) . '<br>';

$bool = array_key_exists(2, $arr) ? 'true' : 'false';
echo "is james inside? " . $bool . '<br>';

$arr = ["april" => "orange"];
print_r($arr);