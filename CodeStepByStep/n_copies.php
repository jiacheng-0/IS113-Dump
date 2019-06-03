<?php
/**
 * Created by PhpStorm.
 * User: micha
 * Date: 1/2/2019
 * Time: 9:13 PM
 */

$arr = [3, 5, 0, 2];

$arr2 = [];
foreach ($arr as $n) {
//    print_r($arr). " ";
    for ($i = 0; $i < $n; $i++) {
        $arr2[] = $n;
    }
}

echo "<pre>";
print_r($arr2). " <br/>";
echo "<pre/>";