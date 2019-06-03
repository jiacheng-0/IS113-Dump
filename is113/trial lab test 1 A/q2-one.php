<?php
/* 
Name:  Teo Jia Cheng
Email: jcteo.2018
*/
?>
<html>
<body>
<?php

if (isset($_POST['fruit']) || isset($_POST['send']) ) {

//    var_dump($_POST['fruit']);
//    var_dump($_POST['send'] == "Submit");

    if (empty($_POST['fruit'])) {

        echo "<h1>Please select a fruit</h1>";
    } else {
        $fruits = $_POST['fruit'];
        echo "<h1>You selected " . count($fruits) . " fruits</h1>";
        echo "<table border='1'>";

        foreach ($fruits as $one_fruit) {
            echo "<tr><td><img src='$one_fruit.jpg'></td></tr>";
        }

        echo "</table>";
    }
}
?>
<form method='post' action='q2-one.php'>

    <input type="checkbox" value="apple" name="fruit[]" id="apple_">
    <label for="apple_">Apple</label>

    <input type="checkbox" value="orange" name="fruit[]" id="orange_">
    <label for="orange_">Orange</label>

    <input type="checkbox" value="pear" name="fruit[]" id="pear_">
    <label for="pear_">Pear</label>

    <br>
    <input type='submit' name='send'>
</form>
</body>
</html>