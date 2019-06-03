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
        if (($n1 != 0 && $n2 == 0) || ($n1 == 0 && $n2 == 0)) {
            $result = "Undefined";
        } else {
            $result = $n1 / $n2;
        }
    }
    return $result;
}

function calculate3($n1, $n2, $n3, $opr1, $opr2)
{
    // PART C
    // YOUR CODE GOES HERE
    if (($opr1 == '/' and $n2 == '0') || ($opr2 == '/' and $n3 == '0')){
        return 'Undefined';
    }
    if (($opr2 == '*' || $opr2 == '/') && !($opr1 == '*' || $opr1 == '/')) {

        $result2 = calculate2($n2, $n3, $opr2);
        $result3 = calculate2($n1, $result2, $opr1);
    } else {

        $result2 = calculate2($n1, $n2, $opr1);
        $result3 = calculate2($result2, $n3, $opr2);
    }

    return $result3;
}

//$num1 = isset($_POST['num1']) ? $_POST['num1'] : 0; // null coalescing
$num1 = $_POST['num1'];
$num2 = $_POST['num2'];
$num3 = $_POST['num3'];
$operator1 = $_POST['operator1'];
$operator2 = $_POST['operator2'];
//echo "$num1 $operator1 $num2 $operator2 $num3<br/>";
$result3 = calculate3($num1, $num2, $num3, $operator1, $operator2);
?>
<html>
<body>
<h1>Result: <?= $result3; ?></h1>
</body>
</html>