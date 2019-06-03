<?php
/**
 * Created by PhpStorm.
 * User: micha
 * Date: 9/2/2019
 * Time: 1:41 AM
 */

$gpa = ["ace" => 4.0, "bay" => 3.7, "cat" => 3.1];

$cat = isset($_GET['student']) ? $_GET['student'] : null;

if ($cat == null) {

    echo "Please enter a name.";

} elseif (in_array($cat, $gpa)) {

    echo $cat . "'s GPA is" . $gpa[$cat];

} else {

    echo $cat . " is not found";
}

if (isset($_GET['student'])) {
    $cat = $_GET['student'];

    if (in_array($cat, $gpa)) {
        echo $cat . "'s GPA is" . $gpa[$cat];
    } else {
        echo $cat . " is not found";
    }
} else {
    echo "Please enter a name.";
}


// Checks whether set then if its empty.
//if (!isset($_GET['student']) || $_GET['student'] == '') {
//    echo "Please enter a name.";
//}

?>

<html>

<body>
<form action="form.php">
    Student <input type='text' name='student'/>
    <input type='submit'>
    <br>
</form>
</body>
</html>
