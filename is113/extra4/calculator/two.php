<?php

function calculate2($n1, $n2, $opr)
{
    // PART A
    // YOUR CODE GOES HERE
    $result = '';

    if ($opr == '+') {
        $result = $n1 + $n2;
    } elseif ($opr == '-') {
        $result = $n1 - $n2;
    } elseif ($opr == '*') {
        $result = $n1 * $n2;
    } elseif ($opr == '/') {
        if ($n1 != 0 && $n2 == 0) {
            $result = "Undefined";
        } else {
            $result = $n1 / $n2;
        }
    }
    return $result;
}

$errors = [];
if (!isset($_POST['num1']) || $_POST['num1'] == '') {
    $errors[] = "num1 is missing";
} elseif (!ctype_digit($_POST['num1'])) {
    $errors[] = "num1 is non-numeric";
}

if (!isset($_POST['num2']) || $_POST['num2'] == '') {
    $errors[] = "num2 is missing";
} elseif (!ctype_digit($_POST['num2'])) {
    $errors[] = "num2 is non-numeric";
}

?>

<html>
<body>

<?php
// PART B
// YOUR CODE GOES HERE
// Use $errors[] Array to list form input validation errors (IF ANY)
$result = '';
if (empty($errors)) {
    $operator = $_POST['operator'];
    $result = 'Result: ' . calculate2($num1, $num2, $operator);
} else {
    echo "<ul>";
    foreach ($errors as $each_error) {
        echo "<li>$each_error</li>";
    }
    echo "</ul>";
}
?>

<h1><?= $result; ?></h1>

</body>
</html>