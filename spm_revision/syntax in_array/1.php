<?php
/**
 * Created by PhpStorm.
 * User: Teo Jia Cheng
 * Date: 24/11/2019
 * Time: 4:41 AM
 */


$arr = ['x' => 'y'];
var_dump($arr);


var_dump(in_array('y', $arr));
/**
 * in_array(needle, haystack)
 * checks for array_values only
 */

var_dump(array_keys($arr));
var_dump(array_key_exists('y', $arr));
var_dump(array_key_exists('x', $arr));