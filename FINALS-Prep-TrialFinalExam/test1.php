<?php
/**
 * Created by PhpStorm.
 * User: Teo Jia Cheng
 * Date: 23/4/2019
 * Time: 1:38 AM
 */

require_once 'invoice.php';

$arr = [
    null => "null gets casted into empty string",
    true => "true",
    false => "false",
    '00' => 'str 1',
    '' => 'replaces the empty string key',
    3.67 => 'McDonald'
];

var_dump($arr);

ksort($arr);

var_dump($arr);

echo empty("    ") ? "TTTT" : "FFFF";

echo "<br>";

//var_dump(strval(123));

//echo intval(0102, 10) . "<br/>";


function longest_consec($strarr, $k) : string
{
    // your code
    $n = count($strarr);
//    var_dump($n);
    $result = "";
    if ($n === 0 || $k > $n || $k <= 0) {
        return $result;
    }
    for ($i = 0; $i < ($n - $k + 1); $i++) {
//        var_dump($i);
        $temp = implode(array_slice($strarr, $i, $k));
//        var_dump( "$i " . $temp);
        if (strlen($temp) > strlen($result))
            $result = $temp;
    }
    return $result;
}

longest_consec(["zone", "abigail", "theta", "form", "libe", "zas", "theta", "abigail"], 2);

echo "0123456"[1];
//var_dump(array_keys(["zone", "abigail", "theta", "form", "libe", "zas", "theta", "abigail"]));
// array_values()

