<?php
/**
 * Created by PhpStorm.
 * User: micha
 * Date: 28/1/2019
 * Time: 6:20 PM
 */

$celebs = ['a', 'b', 'c', 'd'];
for ($i = 1; $i <= count($celebs); $i++){
    echo "$i. " . $celebs[$i-1] . "<br/>";
}

echo "<br/>";

for ($i = 0; $i < count($celebs); $i++){
    echo $i + 1 . ". $celebs[$i]" . "<br/>";
}