<?php
/**
 * Created by PhpStorm.
 * User: micha
 * Date: 28/1/2019
 * Time: 6:39 PM
 */

$fruits = ['apple', 'orange', 'pear'];
echo "<ul>";

foreach ($fruits as $f) {
    echo "<li>$f</li>";
}

echo "</ul>";

$str = 'abcdefghijklmnopqrstuvwxyz';

echo strpos($str, 'xyz') ? 'true' : 'false';
