<?php

// YOUR CODE GOES HERE


//var_dump($_REQUEST);
//echo "<br>";
//
//var_dump($_REQUEST);
//echo "<br>";
//
//echo "<pre>";
//print_r($_REQUEST);
//echo "</pre>";
//echo "<br>";
//
//echo "<h1>$_REQUEST[msg]</h1>"; echo "<br>";
//
////var_export(1 == true); echo "<br>";
//
//echo sizeof($_REQUEST); echo "<br>";
//$msg = $_POST['msg'];
//
//echo var_export($msg === null) . "<br>";
//echo var_export($msg === '');

// == if diff type, convert to same type, then compare
// === if diff types, false, if same type, compare.

?>
<html>
<body>


<?php
$errors = [];
if (!isset($_POST['msg']) || $_POST['msg'] == "") {
    $errors[] = "Why No Message?";
}
// $_POST['msg'] == "" is same as strlen($msg) == 0

if (!isset($_POST['num']) || $_POST['num'] == "") {
    $errors[] = "Why No Number?";
} elseif (!ctype_digit($_POST['num'])) {
    $errors[] = "Num is not an integer";
}

if (sizeof($errors) > 0) {
    echo "<ol>";
    foreach ($errors as $one_error) {
        echo "<li>" . $one_error . "</li>";
    }
    echo "</ol>";
} else {
//    style='border-collapse: collapse'
    $msg = $_POST['msg'];
    $num = $_POST['num'];
    echo "<table border='1' >";
    echo "<tr><th>S/N</th><th>Message</th></tr>";
    for ($i = 1; $i <= $num; $i++) {
        echo "<tr><td>$i</td><td>" . trim($msg) . "</td></tr>";
    }
    echo "</table>";
}
?>

</body>
</html>
