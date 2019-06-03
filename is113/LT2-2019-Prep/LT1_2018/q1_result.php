<!--
Name:   Teo Jia Cheng
Email:  jcteo.2018
-->

<html>
<head>
    <title>q1_result</title>
</head>
<body>
<h1>Prime numbers</h1>
<?php

function is_prime($num){

    // test for false condition
    if ($num <= 1) {
        return false;
    }

    for ($i = 2; $i < $num; $i++) {
        if ($num % $i == 0) {
            return false;
        }
    }

    return true;
}

echo "<ol>";
$min = $_POST['min'];
$max = $_POST['max'];
for ($i = $min; $i <= $max; $i++) {
    $not = " NOT";
    if (is_prime($i)) {
        $not = " ";
    }
    echo "<li>Integer $i is $not prime.</li>";
}
echo "</ol>";
?>




</body>
</html>