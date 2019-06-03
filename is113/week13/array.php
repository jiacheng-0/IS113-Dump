<?php
/**
 * Created by PhpStorm.
 * User: Teo Jia Cheng
 * Date: 31/3/2019
 * Time: 11:17 PM
 */


$first_array = ['xiaoyue', 'female', 18];

if (in_array('xiaoyue', $first_array)) {

    echo $first_array[0] . "<br/>";
    // female
}

$second_array = ['name' => 'xiaoyue', 'gender' => 'female', 'age' => 18];

if (in_array('gender', $second_array)) {

    echo $second_array['gender'] . "<br/>";
    // no output
}

if (array_key_exists('age', $second_array)) {

    echo $second_array['age'] . "<br/>";
    // 18
}

//echo array_search('name', $second_array) ? "Found" : "No luck";
//echo "<br/>";

$first_array = ['xiaoyue', 'female', 18];
if (array_search('female', $first_array)) {
    echo "Found";
} else {
    echo "No luck";
}
echo "<br/>";
// Output: Found

$first_array = ['xiaoyue', 'female', 18];
if (array_search('josiah so handsome', $first_array)) {
    echo "Found";
} else {
    echo "No luck";
}
echo "<br/>";

echo array_search('xiaoyue', $first_array) . "<br/>";
echo array_search('female', $first_array) . "<br/>";
echo array_search(18, $first_array) . "<br/>";
// Output: No luck

echo "<hr/>";

function factorial($n)
{
    echo "$n! = 1";
    $sum = 1;
    for ($j = 2; $j <= $n; $j++) {
        echo " x $j";
        $sum *= $j;{
    }
    if ($n >= 2)
        echo " = $sum";
    }
    echo "<br/>";

}

for ($i = 0; $i <= 4; $i++) {
//    echo "$i<br>";
    factorial($i);
}

//echo array_search('female', $first_array) ? "Found" : "No luck";
//echo "<br/>";