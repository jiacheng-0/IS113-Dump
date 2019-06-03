<?php
/*
Name:  Teo Jia Cheng
Email: jcteo.2018
 */

if (!isset($_GET['numbers']) || !isset($_GET['divisor'])) {

    echo "Start from <a href='q1-B.html'>q1-B.html</a>";
    exit();

} else {

    $numbers = $_GET['numbers'];
    $div = $_GET["divisor"];
    $num_arr = explode(',', $numbers);
//    echo "<pre>";
    //    var_dump($num_arr);
    //    var_dump($div);
    //    echo "</pre>";
}

function is_divisible_by($num, $n): bool
{
    return $num % $n == 0;
}

echo "<ul>";
foreach ($num_arr as $num) {

    $result = is_divisible_by($num, $div) ? "YES" : "NO";

    echo "<li>";
    echo $num . " is divisible by " . $div . ": " . $result;
    echo "</li>";
}
echo "</ul>";
