<?php
/**
 * Created by PhpStorm.
 * User: Teo Jia Cheng
 * Date: 24/11/2019
 * Time: 4:30 AM
 */

if (isset($_POST['name'])) {
    echo "true,";
} else {
    echo "false,";
}

if (empty($_POST['name'])) {
    echo "true,";
} else {
    echo "false,";
}

echo "<br/>";

var_dump(empty(''));
var_dump(empty(' '));
var_dump(empty('      '));
var_dump(empty(null));
var_dump(empty([]));
var_dump(empty(0));
var_dump(empty(0.0));
var_dump(empty(0.00000000000000001));
var_dump(empty(false));

$x = [[1, 2, 3], [3, 4], '0' => [0, 1, 2]];
var_dump($x);

$x[1] = 'hacked';
var_dump($x);

$x['1'] = explode(' ', 'too easy bruh');
var_dump($x);

//$x = ['0' => [1, 2, 3], '1' => [3, 4]];
//var_dump($x);


