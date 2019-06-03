<?php
/* 
 * INSTRUCTIONS
 * 
 * The form below submits back to this same file.
 * After user keys in a number (degrees in F or C), selects unit (F or C) in drop-down menu,
 * and clicks 'equals' button,
 * 1) perform temperature conversion;
 * 2) display converted temperature
 * 
 * Temperature Conversion:
 * 1) Celsius to Fahrenheit
 *    (C * 9/5) + 32 = F
 * 2) Fahrenheit to Celsius
 *    (F - 32) * 5/9 = C
 * 
 * Example:
 * 1.  User keys in 72 degrees and selects F (Fahrenheit) and clicks 'equals' button
 *     - Display:
 *                22.22222 degrees Celsius
 * 2.  User keys in 30 degrees and selects C (Celsius) and clicks 'equals' button
 *     - Display:
 *                86 degrees Fahrenheit
 * 
 */
?>

<html>
<head>
    <title>Celsius <-> Fahrenheit Temperature Conversion</title>
<body>

<form action="temp.php" method='POST'>

    <input type="number" name="temp"

    <?php if (isset($_POST["temp"])) {
        echo "value='{$_POST["temp"]}'";
    }
    ?>

    />

    degrees
    <select name="conversion">
        <?php
        $c_selected = '';
        if (isset($_POST["conversion"]) && $_POST["conversion"] == 'c') {

            $c_selected = 'selected';
        }
        echo "<option value='f'> Fahrenheit to Celsius</option>";
        echo "<option value='c' $c_selected> Celsius to Fahrenheit</option>";
        ?>
    </select>

    <input type="submit" value="equals">

    <?php

    if (isset($_POST["temp"]) && $_POST['temp'] != '') {
        // YOUR CODE GOES HERE
        $temp = $_POST['temp'];
        if ($_POST['conversion'] == 'f') {

            echo $temp . ' F converted to celsius is ' . number_format(($temp - 32) * 5.0 / 9.0, 5) . '°C';
        } elseif ($_POST['conversion'] == 'c') {

            echo $temp . '°C converted to celsius is ' . number_format($temp * 9.0 / 5.0 + 32, 5) . ' F';
        }
    }
    ?>

</form>

</body>
</html>