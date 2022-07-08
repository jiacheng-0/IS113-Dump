<?php
/**
 * Created by PhpStorm.
 * User: Teo Jia Cheng
 * Date: 24/11/2019
 * Time: 4:25 AM
 */

$arr = explode(' ', 'lim jia yi');
var_dump($arr);

for ($i = 0; $i < sizeof($arr); $i++) {
    echo "<li>";
    echo "$arr[$i] <br/>";
    echo "</li>";
}