<?php
/* 
Name:  Teo Jia Cheng
Email: jcteo.2018
*/

//if (1 === 2)
//    echo "JAMESSSSSSSSS <br/>";
////    one line dont need curly braces
//else
//    echo "CHARISSS <br/>";

if (!isset($_POST["check"])) {
//    echo "Start from <a href='q1-A.html'>q1-A.html</a>";
    header('Location: q1-A.html');
    exit();
}

function is_divisible_by($num, $n): bool
{
    return $num % $n == 0;
}

echo "<ul>";

for ($i = 1; $i <= 3; $i++) {

    $num = $_POST["num$i"];
    $div = $_POST["divisor"];

    $result = is_divisible_by($num, $div) ? "YES" : "NO";
    echo "<li>";
    echo $num . " is divisible by " . $div . ": " . $result;
    echo "</li>";
}

echo "</ul>";
