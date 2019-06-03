<?php

// YOUR CODE GOES HERE
//echo isset($_GET['submitted']) ? "true" : "false";

$msg = $_GET['msg'] ?? "Default";
$num = $_GET['num'] ?? 3;
echo $msg . "<br/>";
echo $num . "<br/>";
echo "<table border='1'>
    <tr><th>S/N</th><th>Message</th></tr>
";
for ($i = 1; $i <= $num; $i++) {
    echo "<tr><td>$i</td><td>$msg</td></tr>";
}
echo "</table>";


?>