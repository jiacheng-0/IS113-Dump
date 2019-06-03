<!--
Name:  Teo Jia Cheng
Email: jcteo.2018
-->

<html>
<head>
    <title>q1_result</title>
</head>
<body>
<h1>Prime numbers</h1>

<?php

function check_prime($num): bool
{
    if (!($num > 1)) {
        return false;
    }
    for ($i = 2; $i < $num; $i++) {
        if ($num % $i == 0){
            return false;
        }
    }
    return true;
}

if (isset($_POST['min_num']) && isset($_POST['max_num'])) {

    $min_num = $_POST['min_num'];
    $max_num = $_POST['max_num'];

    echo "<ol>";

    for ($i = $min_num; $i <= $max_num; $i++) {
        $NOT = check_prime($i) ? "" : "NOT";
        // Set to either "" or "NOT"
        echo "<li>Integer $i is $NOT prime.</li>";
    }


    echo "</ol>";
}
?>

</body>
</html>