<?php
/**
 * Created by IntelliJ IDEA.
 * User: micha
 * Date: 19/1/2019
 * Time: 9:11 PM
 */
//echo "this is written in php<br>"
//echo "this is index.php";


//$_1a = 21;
//echo "this has no semicolon >" . $_1a . "<br>";
//so one line of echo doesn't need semicolon
date_default_timezone_set("Asia/Singapore");

$mysum=3+4; //variables start with '$'
$i=10;
echo 'Echoing in single quotes: $mysum';
echo '<br>';
echo "Echoing in double quotes: $mysum";
echo '<br>';
echo 'index : '. "$i";
echo '<br/>';

$num1 = 7; $num2 = 10; $mysum = $num1 + $num2;

echo "$num1 + $num2 = $mysum";
echo '<br/>';
echo "echo echo";
echo '<br/>';
?>

<html lang="en">

<body>

<?php

$_1a = "\$_1a";
echo "Variable is declared as " . $_1a;
?>
<h1>Hello World!</h1>
The time is <?=date("h:i:sa") ?>
<br/>
<br/>
<table border=1>
    <tr>
        <td>Cell 1</td>
        <td>Cell 2</td>
    </tr>
    <tr>
        <td>Cell 3</td>
        <td>Cell 4</td>
    </tr>
</table>

</body>

</html>
